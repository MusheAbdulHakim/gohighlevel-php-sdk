<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

final class ApiKey
{
    /**
     * Creates a new API token value object.
     * @param string $apiKey
     */
    private function __construct(public readonly string $apiKey)
    {
        // ..
    }

    /**
     * @param string $apiKey
     * @return self
     */
    public static function from(string $apiKey): self
    {
        return new self($apiKey);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->apiKey;
    }
}
