<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\Transaction;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->transaction = new Transaction($this->transporter);
});

it('can list transactions', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];
    
    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['transactions' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('payments/transactions', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->transaction->list($altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a transaction', function () {
    $transactionId = 'txn_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];
    
    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['transaction' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("payments/transactions/{$transactionId}", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->transaction->get($transactionId, $altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});
