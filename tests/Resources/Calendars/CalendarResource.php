<?php

use MusheAbdulHakim\GoHighLevel\Resources\Calendars\CalendarResource;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->calendarResource = new CalendarResource($this->transporter);
});

it('can get a resource', function () {
    $id = 'res_1';
    $resourceType = 'equipments';
    $mockApiResponse = ['resource' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("calendars/resources/{$resourceType}/{$id}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendarResource->get($id, $resourceType);
    expect($result)->toBe($mockApiResponse);
});

it('can update a resource', function () {
    $id = 'res_1';
    $resourceType = 'equipments';
    $params = ['name' => 'Updated Name'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("calendars/resources/{$resourceType}/{$id}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendarResource->update($id, $resourceType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a resource', function () {
    $id = 'res_1';
    $resourceType = 'equipments';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete("calendars/resources/{$resourceType}/", $id);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendarResource->delete($id, $resourceType);
    expect($result)->toBe($mockApiResponse);
});

it('can list resources', function () {
    $resourceType = 'equipments';
    $params = ['locationId' => 'loc_1'];
    $mockApiResponse = ['resources' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("calendars/resources/{$resourceType}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendarResource->list($resourceType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create a resource', function () {
    $resourceType = 'equipments';
    $params = ['name' => 'New Equipment'];
    $mockApiResponse = ['resource' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("calendars/resources/{$resourceType}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendarResource->create($resourceType, $params);
    expect($result)->toBe($mockApiResponse);
});
