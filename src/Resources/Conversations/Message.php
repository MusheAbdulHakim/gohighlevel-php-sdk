<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Conversations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\MessageContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Message implements MessageContract
{
    use Transportable;

    public function get(string $id): array|string
    {
        $payload = Payload::get("conversations/messages/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }

    public function byConversation(string $conversationId, $queryParams = []): array|string
    {
        $payload = Payload::get("conversations/{$conversationId}/messages", $queryParams);

        return $this->transporter->requestObject($payload)->data();
    }

    public function send(string $type, string $contactId, $params = []): array|string
    {
        $params['type'] = $type;
        $params['contactId'] = $contactId;
        $payload = Payload::create('conversations/messages', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function inbound(string $type, string $conversationId, string $conversationProviderId, array $params = []): array|string
    {
        $params['type'] = $type;
        $params['conversationId'] = $conversationId;
        $params['conversationProviderId'] = $conversationProviderId;
        $payload = Payload::create('conversations/messages/inbound', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function cancel(string $messageId): array|string
    {
        $payload = Payload::deleteFromUri("conversations/messages/{$messageId}/schedule");

        return $this->transporter->requestObject($payload)->data();
    }

    public function upload(string $conversationId, string $locationId, array $attachmentUrls): array|string
    {
        $params = [
            'multipart' => [
                [
                    'name' => 'conversationId',
                    'contents' => $conversationId,
                ],
            ],
            'locationId' => $locationId,
            'attachmentUrls' => $attachmentUrls,
        ];
        $payload = Payload::upload('conversations/messages/upload', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function updateStatus(string $messageId, $params = []): array|string
    {
        $payload = Payload::put("conversations/messages/{$messageId}/status");

        return $this->transporter->requestObject($payload)->data();
    }

    public function getRecording(string $locationId, string $messageId): array|string
    {
        $payload = Payload::get("conversations/messages/{$messageId}/locations/{$locationId}/recording");

        return $this->transporter->requestObject($payload)->data();
    }
}
