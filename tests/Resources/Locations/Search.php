<?php

use MusheAbdulHakim\GoHighLevel\Resources\Locations\Search;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->search = new Search($this->transporter);
});

it('can search locations', function () {
    $params = ['query' => 'New York'];
    $mockApiResponse = ['locations' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('locations/search', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->search->search($params);
    expect($result)->toBe($mockApiResponse);
});

it('can query locations alias', function () {
    $params = ['query' => 'New York'];
    $mockApiResponse = ['locations' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('locations/search', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->search->query($params);
    expect($result)->toBe($mockApiResponse);
});

it('can search tasks in location', function () {
    $locationId = 'loc_1';
    $params = ['query' => 'urgent'];
    $mockApiResponse = ['tasks' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/tasks/search", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->search->tasks($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
