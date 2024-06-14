<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Opportunities;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities\FollowerContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Follower implements FollowerContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function add(string $id, array $followers): array|string
    {
        $params['followers'] = $followers;
        $payload = Payload::post("opportunities/{$id}/followers", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function remove(string $id): array|string
    {
        $payload = Payload::deleteFromUri("opportunities/{$id}/followers");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $id): array|string
    {
        $payload = Payload::deleteFromUri("opportunities/{$id}/followers");

        return $this->transporter->requestObject($payload)->data();
    }
}
