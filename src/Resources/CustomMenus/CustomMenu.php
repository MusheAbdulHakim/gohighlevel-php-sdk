<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\CustomMenus;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CustomMenus\CustomMenuContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class CustomMenu implements CustomMenuContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $customMenuId): array|string
    {
        $payload = Payload::get("custom-menus/{$customMenuId}");

        return $this->transporter->requestObject($payload)->data();
    }

    public function update(string $customMenuId, array $params): string|array
    {
        $payload = Payload::put("contacts/{$customMenuId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $customMenuId): array|string
    {
        $payload = Payload::delete('custom-menus/', $customMenuId);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $payload = Payload::create('custom-menus/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId): string|array
    {
        $payload = Payload::get('custom-menus/', [
            'locationId' => $locationId,
        ]);

        return $this->transporter
            ->requestObject($payload)
            ->data();
    }
}
