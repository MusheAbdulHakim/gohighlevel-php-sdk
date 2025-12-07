<?php

use MusheAbdulHakim\GoHighLevel\Resources\SocialPlanner\Google;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->google = new Google($this->transporter);
});

it('can start google oauth', function () {
    $locationId = 'loc_1';
    $userId = 'user_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId, 'userId' => $userId]);

    $mockApiResponse = ['url' => 'http://auth.url'];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('social-media-posting/oauth/google/start', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->google->oAuth($locationId, $userId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get business locations', function () {
    $accountId = 'acc_1';
    $locationId = 'loc_1';
    
    $mockApiResponse = ['locations' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("social-media-posting/oauth/$locationId/google/locations/$accountId");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->google->businessLocations($accountId, $locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can set business location', function () {
    $accountId = 'acc_1';
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("social-media-posting/oauth/$locationId/google/locations/$accountId", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->google->setBusinessLocation($accountId, $locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
