<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\FollowerContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Follower implements FollowerContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function add(string $contactId, array $followers): string|array
    {
        $payload = Payload::create("contacts/{$contactId}/followers", [
            'followers' => $followers,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $contactId, array $followers): string|array
    {
        $payload = Payload::create("contacts/{$contactId}/followers", [
            'followers' => $followers,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $contactId): string|array
    {
        $payload = Payload::deleteFromUri("contacts/{$contactId}/followers");

        return $this->transporter->requestObject($payload)->data();
    }
}
