<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\Integration;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->integration = new Integration($this->transporter);
});

it('can create integration', function () {
    $params = ['some' => 'param'];
    $mockApiResponse = ['integration' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('payments/integrations/provider/whitelabel', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->integration->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list integrations', function () {
    $altId = 'loc_1';
    $altType = 'location'; // Optional args
    $params = ['some' => 'param'];
    
    $mockApiResponse = ['integrations' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('payments/integrations/provider/whitelabel', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->integration->list($altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});
