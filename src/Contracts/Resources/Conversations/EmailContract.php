<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations;

interface EmailContract
{
    /**
     * Get email by id
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9b36d7004312c-get-email-by-id
     */
    public function get(string $id): array|string;

    /**
     * Cancel a scheduled email message
     *
     * Post the messageId for the API to delete a scheduled email message.
     *
     * @param  string  $emailMessageId  email Message Id
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/de6b358b5db79-cancel-a-scheduled-email-message
     */
    public function cancelSchedule(string $emailMessageId): array|string;
}
