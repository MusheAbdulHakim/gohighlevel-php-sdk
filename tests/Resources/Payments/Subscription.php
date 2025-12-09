<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\Subscription;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->subscription = new Subscription($this->transporter);
});

it('can list subscriptions', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['subscriptions' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('payments/subscriptions', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->subscription->list($altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a subscription', function () {
    $subscriptionId = 'sub_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'subscriptionId' => $subscriptionId,
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['subscription' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("payments/subscriptions/{$subscriptionId}", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->subscription->get($subscriptionId, $altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});
