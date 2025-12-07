<?php

use MusheAbdulHakim\GoHighLevel\Resources\Auth\OAuth;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;
use MusheAbdulHakim\GoHighLevel\Enums\Transporter\ContentType;
use MusheAbdulHakim\GoHighLevel\Enums\Transporter\Method;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->oauth = new OAuth($this->transporter);
});

it('can get oauth token', function () {
    $clientId = 'client_id';
    $clientSecret = 'client_secret';
    $grantType = 'authorization_code';
    $params = ['code' => 'some_code'];

    $expectedParams = array_merge($params, [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'grant_type' => $grantType,
    ]);

    $mockResponseData = ['access_token' => 'token'];
    $mockApiResponse = $mockResponseData;
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::custom(Method::POST, ContentType::URL_ENCODE, 'oauth/token/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->oauth->get($clientId, $clientSecret, $grantType, $params);

    expect($result)->toBe($mockResponse);
});

it('can get access from agency', function () {
    $companyId = 'company_id';
    $locationId = 'location_id';
    
    $params = [
        'companyId' => $companyId,
        'locationId' => $locationId,
    ];

    $mockResponseData = ['access_token' => 'token'];
    $mockApiResponse = $mockResponseData;
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('oauth/locationToken', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->oauth->AcessFromAgency($companyId, $locationId);

    expect($result)->toBe($mockApiResponse);
});

it('can get app location', function () {
    $appId = 'app_id';
    $companyId = 'company_id';
    
    $params = [
        'appId' => $appId,
        'companyId' => $companyId,
    ];

    $mockResponseData = ['locations' => []];
    $mockApiResponse = $mockResponseData;
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('oauth/installedLocations', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->oauth->appLocation($appId, $companyId);

    expect($result)->toBe($mockApiResponse);
});

it('can get location', function () {
    $appId = 'app_id';
    $companyId = 'company_id';
    
    $params = [
        'appId' => $appId,
        'companyId' => $companyId,
    ];

    $mockResponseData = ['locations' => []];
    $mockApiResponse = $mockResponseData;
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('oauth/installedLocations', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->oauth->location($appId, $companyId);

    expect($result)->toBe($mockApiResponse);
});
