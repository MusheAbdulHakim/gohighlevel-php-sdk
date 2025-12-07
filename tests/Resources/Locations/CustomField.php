<?php

use MusheAbdulHakim\GoHighLevel\Resources\Locations\CustomField;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->customField = new CustomField($this->transporter);
});

it('can list custom fields', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['customFields' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/customFields", []);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customField->list($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a custom field', function () {
    $locationId = 'loc_1';
    $name = 'Field Name';
    $dataType = 'TEXT';
    $params = ['some' => 'param'];
    
    $expectedParams = array_merge($params, ['name' => $name, 'dataType' => $dataType]);
    $mockApiResponse = ['customField' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("locations/{$locationId}/customFields", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customField->create($locationId, $name, $dataType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a custom field', function () {
    $locationId = 'loc_1';
    $id = 'field_1';
    $mockApiResponse = ['customField' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/customFields/{$id}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customField->get($locationId, $id);
    expect($result)->toBe($mockApiResponse);
});

it('can update a custom field', function () {
    $locationId = 'loc_1';
    $id = 'field_1';
    $params = ['name' => 'Updated Name'];
    $mockApiResponse = ['customField' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("locations/{$locationId}/customFields/{$id}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customField->update($locationId, $id, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a custom field', function () {
    $locationId = 'loc_1';
    $id = 'field_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete("locations/{$locationId}/customFields", $id);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customField->delete($locationId, $id);
    expect($result)->toBe($mockApiResponse);
});

it('can upload a custom field file', function () {
    $locationId = 'loc_1';
    $params = ['file' => 'content'];
    $mockApiResponse = ['uploaded' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::upload("locations/{$locationId}/customFields/upload", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customField->upload($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
