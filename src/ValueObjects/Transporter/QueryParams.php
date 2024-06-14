<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter;

/**
 * @internal
 */
final class QueryParams
{
    /**
     * Creates a new Query Params value object.
     *
     * @param array<string, string|int> $params
     */
    private function __construct(private readonly array $params)
    {
        // ..
    }

    /**
     * Creates a new Query Params value object
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * Creates a new Query Params value object, with the newly added param, and the existing params.
     * @param string $name
     * @param string|int $value
     * @return self
     */
    public function withParam(string $name, string|int $value): self
    {
        return new self([
            ...$this->params,
            $name => $value,
        ]);
    }

    /**
     * @return array<string, string|int>
     */
    public function toArray(): array
    {
        return $this->params;
    }
}
