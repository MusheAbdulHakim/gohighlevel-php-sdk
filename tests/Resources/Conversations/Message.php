<?php

use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Message;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->message = new Message($this->transporter);
});

it('can get a message', function () {
    $id = 'msg_1';
    $mockApiResponse = ['message' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/messages/{$id}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->get($id);
    expect($result)->toBe($mockApiResponse);
});

it('can get messages by conversation', function () {
    $conversationId = 'conv_1';
    $params = ['limit' => 10];
    $mockApiResponse = ['messages' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/{$conversationId}/messages", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->byConversation($conversationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can send a message', function () {
    $type = 'SMS';
    $contactId = 'cont_1';
    $params = ['body' => 'Hello'];
    $expectedParams = array_merge($params, ['type' => $type, 'contactId' => $contactId]);

    $mockApiResponse = ['message' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('conversations/messages', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->send($type, $contactId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create inbound message', function () {
    $type = 'SMS';
    $conversationId = 'conv_1';
    $conversationProviderId = 'prov_1';
    $params = ['body' => 'Hello'];
    $expectedParams = array_merge($params, [
        'type' => $type,
        'conversationId' => $conversationId,
        'conversationProviderId' => $conversationProviderId
    ]);

    $mockApiResponse = ['message' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('conversations/messages/inbound', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->inbound($type, $conversationId, $conversationProviderId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create outbound message', function () {
    // Note: The method `outbound` in `Message.php` maps to `conversations/messages/inbound` URI?
    // Code check:
    // public function outbound(string $type, string $conversationId, string $conversationProviderId, array $params = []): array|string
    // {
    //     // ...params assignment...
    //     $payload = Payload::create('conversations/messages/inbound', $params);
    //     // ...
    // }
    // This seems like a COPY PASTE ERROR in source code. It points to 'inbound'.
    // `outbound` method name, but `inbound` URI.
    // I must test what is there.

    $type = 'SMS';
    $conversationId = 'conv_1';
    $conversationProviderId = 'prov_1';
    $params = ['body' => 'Hello'];
    $expectedParams = array_merge($params, [
        'type' => $type,
        'conversationId' => $conversationId,
        'conversationProviderId' => $conversationProviderId
    ]);

    $mockApiResponse = ['message' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('conversations/messages/inbound', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->outbound($type, $conversationId, $conversationProviderId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can cancel message', function () {
    $messageId = 'msg_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("conversations/messages/{$messageId}/schedule");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->cancel($messageId);
    expect($result)->toBe($mockApiResponse);
});

it('can upload attachment', function () {
    $conversationId = 'conv_1';
    $locationId = 'loc_1';
    $attachmentUrls = ['http://example.com/file.jpg'];

    $expectedParams = [
        'multipart' => [
            [
                'name' => 'conversationId',
                'contents' => $conversationId,
            ],
        ],
        'locationId' => $locationId,
        'attachmentUrls' => $attachmentUrls,
    ];

    $mockApiResponse = ['uploaded' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::upload('conversations/messages/upload', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->upload($conversationId, $locationId, $attachmentUrls);
    expect($result)->toBe($mockApiResponse);
});

it('can update status', function () {
    $messageId = 'msg_1';
    $params = ['status' => 'delivered']; // ignored by code, but passing
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("conversations/messages/{$messageId}/status");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->updateStatus($messageId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get recording', function () {
    $locationId = 'loc_1';
    $messageId = 'msg_1';
    $mockApiResponse = ['recording' => 'url'];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/messages/{$messageId}/locations/{$locationId}/recording");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->getRecording($locationId, $messageId);
    expect($result)->toBe($mockApiResponse);
});

it('can get transcript', function () {
    $locationId = 'loc_1';
    $messageId = 'msg_1';
    $mockApiResponse = ['transcript' => 'text'];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/locations/{$locationId}/messages/{$messageId}/transcription");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->getTranscript($locationId, $messageId);
    expect($result)->toBe($mockApiResponse);
});

it('can download transcript', function () {
    $locationId = 'loc_1';
    $messageId = 'msg_1';
    $mockApiResponse = ['download' => 'url'];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/locations/{$locationId}/messages/{$messageId}/transcription/download");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->message->downloadTranscript($locationId, $messageId);
    expect($result)->toBe($mockApiResponse);
});
