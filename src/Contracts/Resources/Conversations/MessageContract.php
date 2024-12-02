<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations;

interface MessageContract
{
    /**
     * Get message by message id
     *
     *
     * @return array<string, number, array<string>>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/a503551cadede-get-message-by-message-id
     */
    public function get(string $id): array|string;

    /**
     * Get messages by conversation id
     *
     * @param  array<string,number>  $params
     * @return array<string,boolean,array<string>>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ab21134dad173-get-messages-by-conversation-id
     */
    public function byConversation(string $conversationId, array $params = []): array|string;

    /**
     * Post the necessary fields for the API to send a new message.
     *
     *
     * @param  string  $type  Allowed values: SMS,Email,WhatsApp,GMB,IG,FB,Custom,Live_Chat
     * @param  array<string, array<string>,number>  $params
     * @return array<string,array<string>>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/5853cb0a54971-send-a-new-message
     */
    public function send(string $type, string $contactId, $params = []): array|string;

    /**
     * Post the necessary fields for the API to add a new inbound message.
     *
     *
     * @param  array<string,array<string>>  $params
     * @return array<bool, string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/3c9036411fcc3-add-an-inbound-message
     */
    public function inbound(string $type, string $conversationId, string $conversationProviderId, array $params = []): array|string;

    /**
     * Add an external outbound call
     *
     * @param  array<string,array<string>>  $params
     * @return array<bool,string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d032812b4e850-add-an-external-outbound-call
     */
    public function outbound(string $type, string $conversationId, string $conversationProviderId, array $params = []): array|string;

    /**
     * Post the messageId for the API to delete a scheduled message.
     *
     * @return array<number,string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/f7e0bc96bf0a4-cancel-a-scheduled-message
     */
    public function cancel(string $messageId): array|string;

    /**
     * Post the necessary fields for the API to upload files. The files need to be a buffer with the key "fileAttachment".
     *
     *
     * @param  array<string>  $attachmentUrls
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cd0f7973ec1b6-upload-file-attachments
     */
    public function upload(string $conversationId, string $locationId, array $attachmentUrls): array|string;

    /**
     * Update message status
     *
     * Post the necessary fields for the API to update message status.
     *
     * @param  array<string,array<string>>  $params
     * @return array<string,array<string>>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/4518573836035-update-message-status
     */
    public function updateStatus(string $messageId, array $params = []): array|string;

    /**
     * Get the recording for a message by passing the message id
     *
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/72f801089fbac-get-recording-by-message-id
     */
    public function getRecording(string $locationId, string $messageId): array|string;

    /**
     * Get transcription by Message ID
     *
     * @return array<number,string, array<string>>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9f8e2c1696a55-get-transcription-by-message-id
     */
    public function getTranscript(string $locationId, string $messageId): array|string;

    /**
     * Download transcription by Message ID
     *
     * @return array<string,number, array<string>>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/2dfde1b5257fe-download-transcription-by-message-id
     */
    public function downloadTranscript(string $locationId, string $messageId): array|string;
}
