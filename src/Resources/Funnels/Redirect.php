<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Funnels;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels\RedirectContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Redirect implements RedirectContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $paylaod = Payload::post('funnels/lookup/redirect', $params);

        return $this->transporter->requestObject($paylaod)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $id, array $params): array|string
    {
        $payload = Payload::patch("funnels/lookup/redirect/{$id}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId, array $params = []): array|string
    {
        $payload = Payload::get("funnels/lookup/redirect/list?locationId=$locationId", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $id, string $locationId): array|string
    {
        $payload = Payload::deleteFromUri("funnels/lookup/redirect/{$id}?locationId={$locationId}");

        return $this->transporter->requestObject($payload)->data();
    }
}
