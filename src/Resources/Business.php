<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Business implements BusinessContract
{
    use Concerns\Transportable;

    public function update(string $businessId, array $params = []): array|string
    {
        $payload = Payload::put("businesses/$businessId", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function delete(string $businessId): array|string
    {
        $payload = Payload::delete('businesses/', $businessId);

        return $this->transporter->requestObject($payload)->data();
    }

    public function get(string $businessId): array|string
    {
        $payload = Payload::get("businesses/{$businessId}");

        return $this->transporter->requestObject($payload)->data();
    }

    public function getByLocation(string $locationId): array|string
    {
        $payload = Payload::get('businesses/', [
            'locationId' => $locationId,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }

    public function create(string $name, string $locationId, array $params = []): array|string
    {
        $params['name'] = $name;
        $params['locationId'] = $locationId;
        $payload = Payload::create('businesses/', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
