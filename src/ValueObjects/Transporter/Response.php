<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

/**
 * @template-covariant TData of array|string
 *
 * @internal
 */
final class Response
{
    /**
     * Creates a new Response value object.
     *
     * @param  TData  $data
     */
    private function __construct(
        private readonly array|string $data    ) {
        // ..
    }

    /**
     * Creates a new Response value object from the given data.
     *
     * @param  TData  $data
     * @param  array<string, array<int, string>>  $headers
     * @return Response<TData>
     */
    public static function from(array|string $data, array $headers): self
    {
        return new self($data);
    }

    /**
     * Returns the response data.
     *
     *
     * @return TData
     */
    public function data(): array|string
    {
        return $this->data;
    }

    /**
     * Get item from the response data.
     *
     * @param string $key
     * @return TData
     */
    public function get(string $key): array|string
    {
        return $this->data[$key];
    }

    /**
     * Returns the response meta data
     *
     * @return array|string
     */
    public function meta(): array|string
    {
        return $this->data['meta'];
    }

    /**
     * Returns the response traceid
     *
     * @return string
     */
    public function traceId(): string
    {
        return $this->data['traceId'];
    }

}
