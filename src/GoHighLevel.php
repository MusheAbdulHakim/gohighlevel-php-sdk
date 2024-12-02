<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel;

use Http\Discovery\Psr18ClientDiscovery;

final class GoHighLevel
{
    /**
     * Request Access Token
     *
     * @param  array<mixed>  $params
     */
    public static function getAccessToken(string $uri = '', string $header = '', array $params = []): mixed
    {
        $client = Psr18ClientDiscovery::find();
        $baseUri = '';
        $contentType = '';
        if ($header !== '') {
            $contentType = $header;
        }
        if ($uri !== '') {
            $baseUri = $uri;
        }
        // @phpstan-ignore-next-line
        $response = $client->request('POST', $baseUri, [
            'form_params' => $params,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => $contentType,
            ],
        ]);

        return json_decode((string) $response->getBody()->getContents(), true);
    }

    /**
     * Initialize the client factory.
     * This gives you control over the client. you will be able to set headers, baseurl,
     * and httpclient.
     */
    public static function init(string $apiKey): Factory
    {
        return self::factory()
            ->withApiKey($apiKey);
    }

    public static function client(string $apiKey, string $version = ''): Client
    {
        $apiVersion = '';
        if ($version !== '') {
            $apiVersion = $version;
        }

        return self::factory()
            ->withApiKey($apiKey)
            ->withVersion($apiVersion)
            ->make();
    }

    /**
     * Creates a new factory instance to configure a custom Open AI Client
     */
    public static function factory(): Factory
    {
        return new Factory();
    }
}
