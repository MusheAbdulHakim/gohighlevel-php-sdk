<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Exceptions;

use Exception;

final class ErrorException extends Exception
{
    /**
     * Creates a new Exception instance.
     *
     * @param  array<mixed>  $contents
     */
    public function __construct(private readonly array $contents)
    {
        //@phpstan-ignore-next-line
        $message = ($contents['message'] ?: (string) $this->contents['code']) ?: 'Unknown error';

        if (is_array($message)) {
            $message = implode(PHP_EOL, $message);
        }
        // @phpstan-ignore-next-line
        parent::__construct($message);
    }

    /**
     * Returns the error message.
     */
    public function getErrorMessage(): string
    {
        return $this->getMessage();
    }

    /**
     * Returns the error type.
     */
    public function getErrorType(): mixed
    {
        return $this->contents['type'];
    }

    /**
     * Returns the error code.
     */
    public function getErrorCode(): mixed
    {
        return $this->contents['code'];
    }
}
