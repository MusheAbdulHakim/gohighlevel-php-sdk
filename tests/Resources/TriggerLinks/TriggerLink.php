<?php

use MusheAbdulHakim\GoHighLevel\Resources\TriggerLinks\TriggerLink;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->triggerLink = new TriggerLink($this->transporter);
});

it('can update a trigger link', function () {
    $linkId = 'link_1';
    $params = ['name' => 'Updated'];
    $mockApiResponse = ['link' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("links/{$linkId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->triggerLink->update($linkId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a trigger link', function () {
    $linkId = 'link_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('links/', $linkId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->triggerLink->delete($linkId);
    expect($result)->toBe($mockApiResponse);
});

it('can get trigger links', function () {
    $locationId = 'loc_1';
    $params = ['locationId' => $locationId];
    $mockApiResponse = ['links' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('links/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->triggerLink->get($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a trigger link', function () {
    $params = ['name' => 'New Link'];
    $mockApiResponse = ['link' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('links/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->triggerLink->create($params);
    expect($result)->toBe($mockApiResponse);
});
