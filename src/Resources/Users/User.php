<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Users;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Users\UsersContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class User implements UsersContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $userId): array|string
    {
        $payload = Payload::get("users/$userId");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $userId, array $params = []): array|string
    {
        $payload = Payload::put("users/$userId", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $userId): array|string
    {
        $payload = Payload::delete('users', $userId);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function byLocation(string $locationId): array|string
    {
        $params = [];
        $params['locationId'] = $locationId;
        $payload = Payload::get('users/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $companyId, array $params): array|string
    {
        $params['companyId'] = $companyId;
        $payload = Payload::post('users/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $companyId, array $params = []): array|string
    {
        $params['companyId'] = $companyId;
        $payload = Payload::get('users/search', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
