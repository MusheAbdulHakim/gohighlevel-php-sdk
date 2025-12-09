<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Search;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->search = new Search($this->transporter);
});

it('can query contacts', function () {
    $params = ['query' => 'foo'];
    $mockApiResponse = ['contacts' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('contacts/search/', $params);

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

it('can get duplicates', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['duplicates' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('contacts/search/duplicate', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->search->getDuplicate($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
