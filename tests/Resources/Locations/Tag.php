<?php

use MusheAbdulHakim\GoHighLevel\Resources\Locations\Tag;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->tag = new Tag($this->transporter);
});

it('can list tags', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['tags' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/tags");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->list($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a tag', function () {
    $locationId = 'loc_1';
    $params = ['name' => 'Tag 1'];
    $mockApiResponse = ['tag' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("locations/{$locationId}/tags", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->create($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a tag', function () {
    $locationId = 'loc_1';
    $tagId = 'tag_1';
    $mockApiResponse = ['tag' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/tags/{$tagId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->get($locationId, $tagId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a tag', function () {
    $locationId = 'loc_1';
    $tagId = 'tag_1';
    $params = ['name' => 'Updated Tag'];
    $mockApiResponse = ['tag' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("locations/{$locationId}/tags/{$tagId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->update($locationId, $tagId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a tag', function () {
    $locationId = 'loc_1';
    $tagId = 'tag_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete("locations/{$locationId}/tags", $tagId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->tag->delete($locationId, $tagId);
    expect($result)->toBe($mockApiResponse);
});
