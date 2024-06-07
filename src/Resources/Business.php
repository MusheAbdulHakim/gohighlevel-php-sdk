<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Business implements BusinessContract
{
    use Concerns\Transportable;

    public function update(string $businessId, array $params)
    {
        $payload = Payload::put("businesses/$businessId", $params);

        $response = $this->transporter->requestObject($payload);

        return $response;
    }

    public function delete(string $businessId)
    {
        $payload = Payload::delete('businesses/', $businessId);

        $response = $this->transporter->requestObject($payload);

        return $response;
    }

    public function get(string $businessId)
    {
        $payload = Payload::get("businesses/{$businessId}");

        $response = $this->transporter->requestObject($payload);

        return $response;
    }

    public function getByLocation(string $locationId)
    {
        $payload = Payload::get('businesses/', [
            'locationId' => $locationId,
        ]);

        $response = $this->transporter->requestObject($payload);

        return $response;
    }

    public function create(string $name, string $locationId, array $params)
    {
        $params['name'] = $name;
        $params['locationId'] = $locationId;
        $payload = Payload::create('businesses/', $params);

        $response = $this->transporter->requestObject($payload);

        return $response;
    }
}
