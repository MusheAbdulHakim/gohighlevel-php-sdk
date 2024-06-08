<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations;

/**
 * Conversations Api
 *
 * @see https://highlevel.stoplight.io/docs/integrations/7fd1120fbd540-conversations-api
 */
interface ConversationContract
{
    /**
     * Create Conversation
     *
     * Creates a new conversation with the data provided

     *
     * @see https://highlevel.stoplight.io/docs/integrations/8d0b19e09176e-create-conversation
     */
    public function create(array $params): array|string;

    /**
     * Get Conversation
     *
     * Get the conversation details based on the conversation ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d22efcfdb0c80-get-conversation
     */
    public function get(string $conversationId): array|string;

    /**
     * Update Conversation
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/f6c7d276afe8e-update-conversation
     */
    public function update(string $conversationId, array $params): array|string;

    /**
     * Delete Conversation
     *
     * Delete the conversation details based on the conversation ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d6b698c33ff49-delete-conversation
     */
    public function delete(string $conversationId): array|string;
}
