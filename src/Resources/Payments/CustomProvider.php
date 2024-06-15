<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Payments;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\CustomProviderContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class CustomProvider implements CustomProviderContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::create('payments/custom-provider/provider', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $locationId): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::deleteFromUri('payments/custom-provider/provider', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig(string $locationId): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('payments/custom-provider/connect', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function createConfig(string $locationId, array $params): array|string
    {
        $payload = Payload::post("payments/custom-provider/connect?locationId={$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteConfig(string $locationId, bool $liveMode): array|string
    {
        $params['liveMode'] = $liveMode;
        $payload = Payload::post("payments/custom-provider/disconnect?locationId={$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
