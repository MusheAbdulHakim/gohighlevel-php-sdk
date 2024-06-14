<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Locations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\CustomFieldContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class CustomField implements CustomFieldContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId): array|string
    {
        $payload = Payload::get("locations/{$locationId}/customFields");

        return $this->transporter->requestObject($payload)->get('customFields');
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $locationId, string $name, string $dataType, array $params): array|string
    {
        $params['name'] = $name;
        $params['dataType'] = $dataType;
        $payload = Payload::create("locations/{$locationId}/customFields", $params);

        return $this->transporter->requestObject($payload)->get('customField');
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $locationId, string $id): array|string
    {
        $payload = Payload::get("locations/{$locationId}/customFields/{$id}");

        return $this->transporter->requestObject($payload)->get('customField');
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $locationId, string $id, array $params): array|string
    {
        $payload = Payload::put("locations/{$locationId}/customFields/{$id}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $locationId, string $id): array|string
    {
        $payload = Payload::delete("locations/{$locationId}/customFields", $id);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function upload(string $locationId, array $params): array|string
    {
        $resource = "locations/{$locationId}/customFields/upload";
        $payload = Payload::upload($resource, $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
