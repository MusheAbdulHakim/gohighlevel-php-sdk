<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

final class InvalidResponseException extends Exception
{
    public function __construct(ResponseInterface $response)
    {
        $reasonPhrase = $response->getReasonPhrase();
        $statusCode = (string) $response->getStatusCode();

        $message = ($reasonPhrase === '' || $reasonPhrase === '0') ? $statusCode : $reasonPhrase;

        // @phpstan-ignore-next-line
        if (is_array($message)) {
            $message = implode(PHP_EOL, $message);
        }
        parent::__construct($message);
    }
}
