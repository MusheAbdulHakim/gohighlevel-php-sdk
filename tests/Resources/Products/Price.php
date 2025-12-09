<?php

use MusheAbdulHakim\GoHighLevel\Resources\Products\Price;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->price = new Price($this->transporter);
});

it('can create price', function () {
    $productId = 'prod_1';
    $params = ['amount' => 100];
    $mockApiResponse = ['price' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("products/{$productId}/price", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->price->create($productId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can list prices', function () {
    $productId = 'prod_1';
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['prices' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("products/{$productId}/price", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->price->list($productId, $locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a price', function () {
    $productId = 'prod_1';
    $priceId = 'price_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['price' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("products/{$productId}/price/{$priceId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->price->get($productId, $priceId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can update a price', function () {
    $productId = 'prod_1';
    $priceId = 'price_1';
    $params = ['amount' => 120];
    $mockApiResponse = ['price' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("products/{$productId}/price/{$priceId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->price->update($productId, $priceId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a price', function () {
    $productId = 'prod_1';
    $priceId = 'price_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("products/{$productId}/price/{$priceId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->price->delete($productId, $priceId, $params);
    expect($result)->toBe($mockApiResponse);
});
