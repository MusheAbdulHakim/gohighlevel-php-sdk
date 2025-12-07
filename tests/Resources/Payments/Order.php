<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\Order;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->order = new Order($this->transporter);
});

it('can list orders', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['orders' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('payments/orders', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->order->list($altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get an order', function () {
    $orderId = 'ord_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['order' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("payments/orders/{$orderId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->order->get($orderId, $params);
    expect($result)->toBe($mockApiResponse);
});
