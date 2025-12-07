<?php

use MusheAbdulHakim\GoHighLevel\Resources\Business;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;
use MusheAbdulHakim\GoHighLevel\ValueObjects\ResourceUri;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->business = new Business($this->transporter);
});

it('can update a business', function () {
    $businessId = '63771dcac1116f0e21de8e12';
    $params = [
        'name' => 'Microsoft',
        'phone' => '+18832327657',
        'email' => 'john@deo.com',
        'postalCode' => '12312312',
    ];
    $mockResponseData = array_merge(['id' => $businessId], $params);
    $mockApiResponse = ['success' => true, 'buiseness' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("businesses/$businessId", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->business->update($businessId, $params);

    expect($result)->toBe($mockApiResponse);
});

it('can delete a business', function () {
    $businessId = '63771dcac1116f0e21de8e12';

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('businesses/', $businessId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->business->delete($businessId);

    expect($result)->toBe($mockApiResponse);
});

it('can get a business by id', function () {
    $businessId = '5DP4iH6HLkQsiKESj6rh';
    $mockResponseData = [
        'id' => $businessId,
        'name' => 'Microsoft',
        'email' => 'abc@microsoft.com'
    ];
    $mockApiResponse = ['business' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("businesses/$businessId");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->business->get($businessId);

    expect($result)->toBe($mockApiResponse);
});

it('can get a business by location', function () {
    $locationId = 'some_location_id';
    $mockResponseData = [['id' => 'business1'], ['id' => 'business2']];
    $mockApiResponse = ['success' => true, 'businesses' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('businesses/', [
        'locationId' => $locationId,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->business->getByLocation($locationId);

    expect($result)->toBe($mockApiResponse);
});

it('can create a business', function () {
    $name = 'New Business';
    $locationId = 'some_location_id';
    $params = ['custom_field' => 'value'];
    $expectedPayloadParams = array_merge($params, [
        'name' => $name,
        'locationId' => $locationId,
    ]);
    $mockResponseData = ['id' => 'new_business_id', 'name' => $name, 'locationId' => $locationId];
    $mockApiResponse = ['success' => true, 'business' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('businesses/', $expectedPayloadParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->business->create($name, $locationId, $params);

    expect($result)->toBe($mockApiResponse);
});