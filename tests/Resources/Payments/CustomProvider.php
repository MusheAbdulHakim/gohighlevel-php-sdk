<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\CustomProvider;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->customProvider = new CustomProvider($this->transporter);
});

it('can create provider', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['provider' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("payments/custom-provider/provider?locationId={$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->create($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete provider', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("payments/custom-provider/provider?locationId={$locationId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->delete($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can get config', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['config' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('payments/custom-provider/connect', ['locationId' => $locationId]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->getConfig($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create config', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['config' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("payments/custom-provider/connect?locationId={$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->createConfig($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete config', function () {
    $locationId = 'loc_1';
    $liveMode = true;
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("payments/custom-provider/disconnect?locationId={$locationId}", ['liveMode' => $liveMode]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->deleteConfig($locationId, $liveMode);
    expect($result)->toBe($mockApiResponse);
});

it('can disconnect config', function () {
    $locationId = 'loc_1';
    $liveMode = true;
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("payments/custom-provider/disconnect?locationId={$locationId}", ['liveMode' => $liveMode]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->disconnectConfig($locationId, $liveMode);
    expect($result)->toBe($mockApiResponse);
});

it('can disconnect alias', function () {
    $locationId = 'loc_1';
    $liveMode = true;
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("payments/custom-provider/disconnect?locationId={$locationId}", ['liveMode' => $liveMode]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->customProvider->disconnect($locationId, $liveMode);
    expect($result)->toBe($mockApiResponse);
});
