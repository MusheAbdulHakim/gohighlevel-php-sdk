<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

final class InvalidResponseException extends Exception
{
    public function __construct(ResponseInterface $response)
    {
        $message = ((in_array($response->getReasonPhrase(), ['', '0'], true) ? (string) $response->getStatusCode() : $response->getReasonPhrase()) !== '' && (in_array($response->getReasonPhrase(), ['', '0'], true) ? (string) $response->getStatusCode() : $response->getReasonPhrase()) !== '0') ? in_array($response->getReasonPhrase(), ['', '0'], true) ? (string) $response->getStatusCode() : $response->getReasonPhrase() : 'Unknown error';

        // @phpstan-ignore-next-line
        if (is_array($message)) {
            $message = implode(PHP_EOL, $message);
        }
        parent::__construct($message);
    }
}
