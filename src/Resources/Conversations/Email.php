<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Conversations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\EmailContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Email implements EmailContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $id): array|string
    {
        $payload = Payload::get("conversations/messages/email/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }

    public function cancelSchedule(string $emailMessageId): array|string
    {
        $payload = Payload::deleteFromUri("conversations/messages/email/{$emailMessageId}/schedule");

        return $this->transporter->requestObject($payload)->data();
    }
}
