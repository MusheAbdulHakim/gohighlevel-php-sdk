<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Conversations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\ConversationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\EmailContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\MessageContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\SearchContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

/**
 * {@inheritDoc}
 */
final class Conversation implements ConversationContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $conversationId): array|string
    {
        $payload = Payload::get("conversations/{$conversationId}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $conversationId, array $params): array|string
    {
        $payload = Payload::put("conversations/{$conversationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $conversationId): array|string
    {
        $payload = Payload::delete('conversations', $conversationId);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $payload = Payload::create('conversations', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * Conversation Email
     */
    public function email(): EmailContract
    {
        return new Email($this->transporter);
    }

    /**
     * Conversation Message
     */
    public function Message(): MessageContract
    {
        return new Message($this->transporter);
    }

    public function search(): SearchContract
    {
        return new Search($this->transporter);
    }
}
