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
    public function list(string $contactId)
    {
        $payload = Payload::get("contacts/{$contactId}/notes");

        return $this->transporter->requestObject($payload)->get('notes');
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $contactId, string $userId, string $body)
    {
        $payload = Payload::create("contacts/{$contactId}/notes", [
            'userId' => $userId,
            'body' => $body,
        ]);

        return $this->transporter->requestObject($payload)->get('note');
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $contactId, string $id)
    {
        $payload = Payload::get("contacts/{$contactId}/notes/{$id}");

        return $this->transporter->requestObject($payload)->get('note');
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $contactId, string $id, string $userId, string $body)
    {
        $payload = Payload::put("contacts/{$contactId}/notes/{$id}");

        return $this->transporter->requestObject($payload)->get('note');
    }

    public function delete(string $contactId, string $id)
    {
        $payload = Payload::deleteFromUri("contacts/{$contactId}/notes/{$id}");
    }
}
