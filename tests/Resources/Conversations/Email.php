<?php

use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Email;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->email = new Email($this->transporter);
});

it('can get an email', function () {
    $id = 'msg_1';
    $mockApiResponse = ['email' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("conversations/messages/email/{$id}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->email->get($id);
    expect($result)->toBe($mockApiResponse);
});

it('can cancel scheduled email', function () {
    $emailMessageId = 'msg_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("conversations/messages/email/{$emailMessageId}/schedule");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->email->cancelSchedule($emailMessageId);
    expect($result)->toBe($mockApiResponse);
});
