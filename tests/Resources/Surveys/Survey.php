<?php

use MusheAbdulHakim\GoHighLevel\Resources\Surveys\Survey;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->survey = new Survey($this->transporter);
});

it('can get submissions', function () {
    $locationId = 'loc_1';
    $params = ['page' => 1];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['submissions' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('surveys/submissions', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->survey->submissions($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can list surveys', function () {
    $locationId = 'loc_1';
    $params = ['limit' => 10];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['surveys' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('surveys/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->survey->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
