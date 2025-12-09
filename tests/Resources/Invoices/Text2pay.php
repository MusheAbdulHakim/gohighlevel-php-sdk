<?php

use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Text2pay;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->text2pay = new Text2pay($this->transporter);
});

it('can create text2pay', function () {
    $params = ['amount' => 100];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('invoices/text2pay/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->text2pay->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can update text2pay', function () {
    $id = 'inv_1';
    $params = ['amount' => 120];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/text2pay/{$id}/", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->text2pay->update($id, $params);
    expect($result)->toBe($mockApiResponse);
});
