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
     * @param array<number, string, object>|string $data
     */
    private function __construct(
        private array|string $data)
    {
        // ..
    }

    /**
     * Creates a new Response value object from the given data.
     *
     *
     * @param  array<string,number, object>|string  $data
     * @param  array<string, array<int, string>>  $headers
     */
    public static function from(array|string $data, array $headers): self
    {
        return new self($data);
    }

    /**
     * Returns the response data.
     *
     * @return array<string, array<number, string>, number, boolean>|string
     */
    public function data(): array|string
    {
        return $this->data;
    }

    /**
     * Get item from the response data.
     *
     * @return array<string, int, number, object, array<object>>|string
     */
    public function get(string $key): array|string
    {
        return $this->data[$key];
    }

}
