<?php

use MusheAbdulHakim\GoHighLevel\Resources\Funnels\Funnel;
use MusheAbdulHakim\GoHighLevel\Resources\Funnels\Redirect;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->funnel = new Funnel($this->transporter);
});

it('can list funnels', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['funnels' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('funnels/funnel/list/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->funnel->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can list funnel pages', function () {
    $funnelId = 'fun_1';
    $locationId = 'loc_1';
    $limit = 10;
    $offset = 0;
    $params = ['some' => 'param'];
    
    $expectedParams = array_merge($params, [
        'funnelId' => $funnelId,
        'locationId' => $locationId,
        'limit' => $limit,
        'offset' => $offset,
    ]);

    $mockApiResponse = ['pages' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('funnels/page', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->funnel->pages($funnelId, $locationId, $limit, $offset, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can count funnel pages', function () {
    $funnelId = 'fun_1';
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    
    $expectedParams = array_merge($params, [
        'funnelId' => $funnelId,
        'locationId' => $locationId,
    ]);

    $mockApiResponse = ['count' => 5];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('funnels/page/count', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->funnel->countPages($funnelId, $locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get redirect resource', function () {
    expect($this->funnel->redirect())->toBeInstanceOf(Redirect::class);
});
