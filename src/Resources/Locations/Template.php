<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Locations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\TemplateContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Template implements TemplateContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId, string $originId, array $params = []): array|string
    {
        $params['originId'] = $originId;
        $payload = Payload::get("locations/{$locationId}/templates", $params);

        return $this->transporter->requestObject($payload)->get('templates');
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $locationId, string $id): array|string
    {
        $payload = Payload::delete('locations/{locationId}/templates/', $id);

        return $this->transporter->requestObject($payload)->data();
    }
}
