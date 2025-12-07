<?php

use MusheAbdulHakim\GoHighLevel\Resources\Locations\CustomValue;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->customValue = new CustomValue($this->transporter);
});

it('can list custom values', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['customValues' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/customValues");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customValue->list($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a custom value', function () {
    $locationId = 'loc_1';
    $params = ['name' => 'Value Name', 'value' => '123'];
    $mockApiResponse = ['customValue' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("locations/{$locationId}/customValues", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customValue->create($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a custom value', function () {
    $locationId = 'loc_1';
    $id = 'val_1';
    $mockApiResponse = ['customValue' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/customValues/{$id}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customValue->get($locationId, $id);
    expect($result)->toBe($mockApiResponse);
});

it('can update a custom value', function () {
    $locationId = 'loc_1';
    $id = 'val_1';
    $params = ['value' => '456'];
    $mockApiResponse = ['customValue' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("locations/{$locationId}/customValues/{$id}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customValue->update($locationId, $id, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a custom value', function () {
    $locationId = 'loc_1';
    $id = 'val_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete("locations/{$locationId}/customValues", $id);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customValue->delete($locationId, $id);
    expect($result)->toBe($mockApiResponse);
});
