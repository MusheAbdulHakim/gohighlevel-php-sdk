<?php

use MusheAbdulHakim\GoHighLevel\Resources\Locations\Location;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\Tag;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\CustomField;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\CustomValue;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\Template;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\Search;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\Timezone;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->location = new Location($this->transporter);
});

it('can create a location', function () {
    $params = ['name' => 'New Location'];
    $mockApiResponse = ['location' => ['id' => 'loc_1']];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('locations/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->location->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a location', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['location' => ['id' => 'loc_1']];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->location->get($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a location', function () {
    $locationId = 'loc_1';
    $params = ['name' => 'Updated Name'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("locations/{$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->location->update($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a location', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('locations', $locationId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->location->delete($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can get sub-resources', function () {
    expect($this->location->tag())->toBeInstanceOf(Tag::class);
    expect($this->location->customField())->toBeInstanceOf(CustomField::class);
    expect($this->location->customValue())->toBeInstanceOf(CustomValue::class);
    expect($this->location->template())->toBeInstanceOf(Template::class);
    expect($this->location->search())->toBeInstanceOf(Search::class);
    expect($this->location->timezone())->toBeInstanceOf(Timezone::class);
});
