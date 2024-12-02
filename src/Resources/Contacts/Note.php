<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\NoteContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Note implements NoteContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $contactId): string|array
    {
        $payload = Payload::get("contacts/{$contactId}/notes");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $contactId, string $userId, string $body): string|array
    {
        $payload = Payload::create("contacts/{$contactId}/notes", [
            'userId' => $userId,
            'body' => $body,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $contactId, string $id): string|array
    {
        $payload = Payload::get("contacts/{$contactId}/notes/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $contactId, string $id, string $userId, string $body): string|array
    {
        $payload = Payload::put("contacts/{$contactId}/notes/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $contactId, string $id): array|string
    {
        $payload = Payload::deleteFromUri("contacts/{$contactId}/notes/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }
}
