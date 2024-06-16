<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Business implements BusinessContract
{
    use Concerns\Transportable;

    public function update(string $businessId, array $params): \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
    {
        $payload = Payload::put("businesses/$businessId", $params);

        return $this->transporter->requestObject($payload);
    }

    public function delete(string $businessId): \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
    {
        $payload = Payload::delete('businesses/', $businessId);

        return $this->transporter->requestObject($payload);
    }

    public function get(string $businessId): \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
    {
        $payload = Payload::get("businesses/{$businessId}");

        return $this->transporter->requestObject($payload);
    }

    public function getByLocation(string $locationId): \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
    {
        $payload = Payload::get('businesses/', [
            'locationId' => $locationId,
        ]);

        return $this->transporter->requestObject($payload);
    }

    public function create(string $name, string $locationId, array $params): \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
    {
        $params['name'] = $name;
        $params['locationId'] = $locationId;
        $payload = Payload::create('businesses/', $params);

        return $this->transporter->requestObject($payload);
    }
}
