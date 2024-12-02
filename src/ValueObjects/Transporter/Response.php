<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

/**
 *
 * @internal
 */
final readonly class Response
{
    /**
     * Creates a new Response value object.
     * @param array<number, string>|string $data
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
     * @param  array<string,number>|string  $data
     * @param  array<string, array<number, string>, boolean, number>  $headers
     * 
     * @return \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
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
     * @return array<string, number, array<string, number>>|string
     */
    public function get(string $key): array|string
    {
        return $this->data[$key];
    }

}
