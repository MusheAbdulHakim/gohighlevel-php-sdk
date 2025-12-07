<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Tag;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->tag = new Tag($this->transporter);
});

it('can create tags', function () {
    $contactId = '123';
    $tags = ['tag1', 'tag2'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("contacts/{$contactId}/tags", [
        'tags' => $tags,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->create($contactId, $tags);
    expect($result)->toBe($mockApiResponse);
});

it('can remove tags', function () {
    $contactId = '123';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("contacts/{$contactId}/tags");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->remove($contactId);
    expect($result)->toBe($mockApiResponse);
});

it('can delete tags alias', function () {
    // Tests the delete alias method which calls remove
    $contactId = '123';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("contacts/{$contactId}/tags");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->delete($contactId);
    expect($result)->toBe($mockApiResponse);
});
