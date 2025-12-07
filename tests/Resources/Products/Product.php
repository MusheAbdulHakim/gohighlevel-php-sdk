<?php

use MusheAbdulHakim\GoHighLevel\Resources\Products\Product;
use MusheAbdulHakim\GoHighLevel\Resources\Products\Price;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->product = new Product($this->transporter);
});

it('can get a product', function () {
    $productId = 'prod_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['product' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("products/{$productId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->product->get($productId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a product', function () {
    $productId = 'prod_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("products/{$productId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->product->delete($productId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can update a product', function () {
    $productId = 'prod_1';
    $params = ['name' => 'Updated'];
    $mockApiResponse = ['product' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("products/{$productId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->product->update($productId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create a product', function () {
    $params = ['name' => 'New Product'];
    $mockApiResponse = ['product' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('products/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->product->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list products', function () {
    $locationId = 'loc_1';
    $params = ['limit' => 10];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['products' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('products/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->product->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get price resource', function () {
    expect($this->product->price())->toBeInstanceOf(Price::class);
});
