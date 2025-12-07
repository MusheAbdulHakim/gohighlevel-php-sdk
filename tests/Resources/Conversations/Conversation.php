<?php

use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Conversation;
use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Email;
use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Message;
use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Search;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->conversation = new Conversation($this->transporter);
});

it('can get a conversation', function () {
    $conversationId = 'conv_1';
    $mockApiResponse = ['conversation' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/{$conversationId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->conversation->get($conversationId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a conversation', function () {
    $conversationId = 'conv_1';
    $params = ['status' => 'read'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("conversations/{$conversationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->conversation->update($conversationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a conversation', function () {
    $conversationId = 'conv_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('conversations', $conversationId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->conversation->delete($conversationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a conversation', function () {
    $params = ['contactId' => 'cont_1'];
    $mockApiResponse = ['conversation' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('conversations/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->conversation->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can get sub-resources', function () {
    expect($this->conversation->email())->toBeInstanceOf(Email::class);
    expect($this->conversation->message())->toBeInstanceOf(Message::class);
    expect($this->conversation->search())->toBeInstanceOf(Search::class);
});
