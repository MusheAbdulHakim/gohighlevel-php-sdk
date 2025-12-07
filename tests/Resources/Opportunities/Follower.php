<?php

use MusheAbdulHakim\GoHighLevel\Resources\Opportunities\Follower;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->follower = new Follower($this->transporter);
});

it('can add followers', function () {
    $id = 'opp_1';
    $followers = ['user_1'];
    $params = ['followers' => $followers];
    
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("opportunities/{$id}/followers", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->follower->add($id, $followers);
    expect($result)->toBe($mockApiResponse);
});

it('can remove followers', function () {
    $id = 'opp_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("opportunities/{$id}/followers");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->follower->remove($id);
    expect($result)->toBe($mockApiResponse);
});

it('can delete followers alias', function () {
    $id = 'opp_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("opportunities/{$id}/followers");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->follower->delete($id);
    expect($result)->toBe($mockApiResponse);
});
