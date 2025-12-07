<?php

use MusheAbdulHakim\GoHighLevel\Resources\SaaS\Saas;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->saas = new Saas($this->transporter);
});

it('can get saas locations', function () {
    $params = ['some' => 'param'];
    $mockApiResponse = ['locations' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('saas-api/public-api/locations', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->saas->get($params);
    expect($result)->toBe($mockApiResponse);
});

it('can update saas subscription', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("saas-api/public-api/update-saas-subscription/{$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->saas->update($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can disable bulk saas', function () {
    $companyId = 'comp_1';
    $params = ['locationIds' => ['loc_1']];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("saas-api/public-api/bulk-disable-saas/{$companyId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->saas->disable($companyId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can enable saas', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("saas-api/public-api/enable-saas/{$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->saas->enable($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can pause saas', function () {
    $locationId = 'loc_1';
    $params = ['paused' => true];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("saas-api/public-api/pause/{$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->saas->pause($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can update rebilling', function () {
    $companyId = 'comp_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("saas-api/public-api/update-rebilling/{$companyId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->saas->updateRebilling($companyId, $params);
    expect($result)->toBe($mockApiResponse);
});
