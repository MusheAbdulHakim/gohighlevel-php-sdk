<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

use MusheAbdulHakim\GoHighLevel\Enums\Transporter\ContentType;

/**
 * @internal
 */
final class Headers
{
    /**
     * Creates a new Headers value object.
     *
     * @param array<string, string> $headers
     */
    private function __construct(private readonly array $headers)
    {
        // ..
    }

    /**
     * Creates a new Headers value object
     * @return self
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * Creates a new Headers value object with the given API token.
     * @param ApiKey $apiKey
     * @return self
     */
    public static function withAuthorization(ApiKey $apiKey): self
    {
        return new self([
            'Authorization' => "Bearer {$apiKey->toString()}",
        ]);
    }

    /**
     * Creates a new Headers value object, with the given content type, and the existing headers.
     * @param ContentType $contentType
     * @param string $suffix
     * @return self
     */
    public function withContentType(ContentType $contentType, string $suffix = ''): self
    {
        return new self([
            ...$this->headers,
            'Content-Type' => $contentType->value . $suffix,
        ]);
    }

    /**
     * Creates a new Headers value object, with the given api version, and the existing headers.
     * @param string $apiVersion
     * @return self
     */
    public function withApiVersion(string $apiVersion): self
    {
        return new self([
            ...$this->headers,
            'Version' => $apiVersion,
        ]);
    }

    /**
     * Creates a new Headers value object, with the newly added header, and the existing headers.
     * @param string $name
     * @param string $value
     * @return self
     */
    public function withCustomHeader(string $name, string $value): self
    {
        return new self([
            ...$this->headers,
            $name => $value,
        ]);
    }

    /**
     * @return array<string, string> $headers
     */
    public function toArray(): array
    {
        return $this->headers;
    }
}
