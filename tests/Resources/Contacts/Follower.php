<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Follower;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->follower = new Follower($this->transporter);
});

it('can add followers', function () {
    $contactId = '123';
    $followers = ['user_1'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("contacts/{$contactId}/followers", [
        'followers' => $followers,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->follower->add($contactId, $followers);
    expect($result)->toBe($mockApiResponse);
});

it('can create followers', function () {
    $contactId = '123';
    $followers = ['user_1'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("contacts/{$contactId}/followers", [
        'followers' => $followers,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->follower->create($contactId, $followers);
    expect($result)->toBe($mockApiResponse);
});

it('can delete followers', function () {
    $contactId = '123';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("contacts/{$contactId}/followers");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->follower->delete($contactId);
    expect($result)->toBe($mockApiResponse);
});
