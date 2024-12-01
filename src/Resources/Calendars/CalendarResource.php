<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Calendars;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars\CalendarResourceContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class CalendarResource implements CalendarResourceContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $id, string $resourceType): array|string
    {
        $payload = Payload::get("calendars/resources/{$resourceType}/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $id, string $resourceType, array $params = []): array|string
    {
        $payload = Payload::put("calendars/resources/{$resourceType}/{$id}", $params);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $id, string $resourceType): array|string
    {
        $payload = Payload::delete("calendars/resources/{$resourceType}/", $id);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function list(string $resourceType, $params = []): array|string
    {
        $payload = Payload::get("calendars/resources/{$resourceType}", $params);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function create(string $resourceType, $params = []): array|string
    {
        $payload = Payload::create("calendars/resources/{$resourceType}", $params);

        return $this->transporter->requestObject($payload)->data();

    }
}
