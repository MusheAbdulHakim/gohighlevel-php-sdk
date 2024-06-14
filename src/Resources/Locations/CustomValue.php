<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Locations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\CustomValueContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class CustomValue implements CustomValueContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId): array|string
    {
        $payload = Payload::get("locations/{$locationId}/customValues");

        return $this->transporter->requestObject($payload)->get('customValues');
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $locationId, array $params): array|string
    {
        $payload = Payload::create("locations/{$locationId}/customValues", $params);

        return $this->transporter->requestObject($payload)->get('customValue');
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $locationId, string $id): array|string
    {
        $payload = Payload::get("locations/{$locationId}/customValues/{$id}");

        return $this->transporter->requestObject($payload)->get('customValue');
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $locationId, string $id, array $params): array|string
    {
        $payload = Payload::put("locations/{$locationId}/customValues/{$id}", $params);

        return $this->transporter->requestObject($payload)->get('customValue');
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $locationId, string $id): array|string
    {
        $payload = Payload::delete("locations/{$locationId}/customValues", $id);

        return $this->transporter->requestObject($payload)->data();
    }
}
