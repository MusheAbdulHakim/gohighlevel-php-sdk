<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\TagContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Tag implements TagContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(string $contactId, array|string $tags): string|array
    {
        $payload = Payload::create("contacts/{$contactId}/tags", [
            'tags' => $tags,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function remove(string $contactId): array|string
    {
        $payload = Payload::deleteFromUri("contacts/{$contactId}/tags");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * Remove a tag
     */
    public function delete(string $id): array|string
    {
        return $this->remove($id);
    }
}
