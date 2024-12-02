<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Transporters;

use Closure;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use JsonException;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\Enums\Transporter\ContentType;
use MusheAbdulHakim\GoHighLevel\Exceptions\ErrorException;
use MusheAbdulHakim\GoHighLevel\Exceptions\TransporterException;
use MusheAbdulHakim\GoHighLevel\Exceptions\UnserializableResponse;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\BaseUri;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Headers;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\QueryParams;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
final readonly class HttpTransporter implements TransporterContract
{
    /**
     * Creates a new Http Transporter instance.
     */
    public function __construct(
        private ClientInterface $client,
        private BaseUri $baseUri,
        private Headers $headers,
        private QueryParams $queryParams,
        private Closure $streamHandler,
    ) {
        // ..
    }

    /**
     * {@inheritDoc}
     *
     *
     * @throws ErrorException
     * @throws JsonException
     * @throws TransporterException
     * @throws UnserializableResponse
     */
    public function requestObject(Payload $payload): Response
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        $response = $this->sendRequest(fn (): ResponseInterface => $this->client->sendRequest($request));

        if ($response->getStatusCode() === 404) {
            throw new RequestException('404 Error. Please check the endpoint', $request, $response);
        }

        $contents = $response->getBody()->getContents();

        if (str_contains($response->getHeaderLine('Content-Type'), ContentType::TEXT_PLAIN->value)) {
            return Response::from($contents, $response->getHeaders());
        }

        $this->throwIfJsonError($response, $contents);

        try {
            /** @phpstan-assert array{error?: array{message: string, type: string, code: string}} $data */
            $data = json_decode($contents, true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $jsonException) {
            throw new UnserializableResponse($jsonException);
        }

        // @phpstan-ignore-next-line
        return Response::from($data, $response->getHeaders());
    }

    /**
     * {@inheritDoc}
     */
    public function requestContent(Payload $payload): string
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        $response = $this->sendRequest(fn (): ResponseInterface => $this->client->sendRequest($request));

        $contents = $response->getBody()->getContents();

        $this->throwIfJsonError($response, $contents);

        return $contents;
    }

    /**
     * {@inheritDoc}
     */
    public function requestStream(Payload $payload): ResponseInterface
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        $response = $this->sendRequest(fn () => ($this->streamHandler)($request));

        $this->throwIfJsonError($response, $response);

        return $response;
    }

    private function sendRequest(Closure $callable): ResponseInterface
    {
        try {
            return $callable();
        } catch (ClientExceptionInterface $clientException) {
            if ($clientException instanceof ClientException) {
                $this->throwIfJsonError($clientException->getResponse(), $clientException->getResponse()->getBody()->getContents());
            }

            throw new TransporterException($clientException);
        }
    }

    private function throwIfJsonError(ResponseInterface $response, string|ResponseInterface $contents): void
    {
        if ($response->getStatusCode() < 400) {
            return;
        }

        if (! str_contains($response->getHeaderLine('Content-Type'), ContentType::JSON->value)) {
            return;
        }

        if ($contents instanceof ResponseInterface) {
            $contents = $contents->getBody()->getContents();
        }

        try {
            $response = json_decode($contents, true, flags: JSON_THROW_ON_ERROR);

            // @phpstan-ignore-next-line
            if (isset($response['error'])) {
                // @phpstan-ignore-next-line
                throw new ErrorException($response);
            }
        } catch (JsonException $jsonException) {
            throw new UnserializableResponse($jsonException);
        }
    }
}
