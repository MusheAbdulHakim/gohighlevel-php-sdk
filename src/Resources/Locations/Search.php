<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Locations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\SearchContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Search implements SearchContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function search(array $params): array|string
    {
        $payload = Payload::get('locations/search', $params);

        return $this->transporter->requestObject($payload)->get('locations');
    }

    /**
     * {@inheritDoc}
     */
    public function tasks(string $locationId, array $params = []): array|string
    {
        $payload = Payload::get("locations/{$locationId}/tasks/search", $params);

        return $this->transporter->requestObject($payload)->get('tasks');
    }
}
