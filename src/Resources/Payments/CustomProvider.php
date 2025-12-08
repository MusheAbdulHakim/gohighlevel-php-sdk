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
        $payload = Payload::create("payments/custom-provider/provider?locationId=$locationId", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $locationId): array|string
    {
        $payload = Payload::deleteFromUri("payments/custom-provider/provider?locationId=$locationId");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig(string $locationId): array|string
    {
        $params = [];
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
        $params = [];
        $params['liveMode'] = $liveMode;
        $payload = Payload::post("payments/custom-provider/disconnect?locationId={$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function disconnectConfig(string $locationId, bool $liveMode): array|string
    {
        $params = [];
        $params['liveMode'] = $liveMode;
        $payload = Payload::post("payments/custom-provider/disconnect?locationId={$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * @return array<mixed>|string
     */
    public function disconnect(string $locationId, bool $liveMode): array|string
    {
        return $this->disconnectConfig($locationId, $liveMode);
    }
}
