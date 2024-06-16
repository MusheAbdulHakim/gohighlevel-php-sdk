<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

/**
 * @template-covariant TData of array|string
 *
 * @internal
 */
final readonly class Response
{
    /**
     * Creates a new Response value object.
     */
    private function __construct(
        private array|string $data)
    {
        // ..
    }

    /**
     * Creates a new Response value object from the given data.
     *
     * @param  array<string, array<int, string>>  $headers
     */
    public static function from(array|string $data, array $headers): self
    {
        return new self($data);
    }

    /**
     * Returns the response data.
     *
     * @return array<string, array<int, string>>|string
     */
    public function data(): array|string
    {
        return $this->data;
    }

    /**
     * Get item from the response data.
     *
     * @return array<string, int>|string
     */
    public function get(string $key): array|string
    {
        return $this->data[$key];
    }

    /**
     * Returns the response meta data
     *
     * @return array<string, int>|string
     */
    public function meta(): array|string
    {
        return $this->data['meta'];
    }

    /**
     * Returns the response traceId
     */
    public function traceId(): string
    {
        return $this->data['traceId'];
    }
}
