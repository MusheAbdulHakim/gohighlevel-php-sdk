<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

final readonly class ApiKey
{
    /**
     * Creates a new API token value object.
     */
    private function __construct(public string $apiKey)
    {
        // ..
    }

    public static function from(string $apiKey): self
    {
        return new self($apiKey);
    }

    public function toString(): string
    {
        return $this->apiKey;
    }
}
