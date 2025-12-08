<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\TriggerLinks;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\TriggerLinks\TriggerLinkContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class TriggerLink implements TriggerLinkContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function update(string $linkId, array $params): array|string
    {
        $payload = Payload::put("links/{$linkId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $linkId): array|string
    {
        $payload = Payload::delete('links/', $linkId);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $locationId): array|string
    {
        $params = [];
        $params['locationId'] = $locationId;
        $payload = Payload::get('links/', $params);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $payload = Payload::post('links/', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
