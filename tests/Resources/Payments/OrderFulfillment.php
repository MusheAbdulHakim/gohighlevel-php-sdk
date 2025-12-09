<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\OrderFulfillment;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->orderFulfillment = new OrderFulfillment($this->transporter);
});

it('can create fulfillment', function () {
    $orderId = 'ord_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['fulfillment' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("payments/orders/{$orderId}/fulfillments", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->orderFulfillment->create($orderId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can list fulfillments', function () {
    $orderId = 'ord_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['fulfillments' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("payments/orders/{$orderId}/fulfillments", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->orderFulfillment->list($orderId, $params);
    expect($result)->toBe($mockApiResponse);
});
