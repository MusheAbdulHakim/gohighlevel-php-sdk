<?php

use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Invoice;
use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Schedule;
use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Template;
use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Text2pay;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->invoice = new Invoice($this->transporter);
});

it('can generate invoice number', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $params = [
        'altId' => $altId,
        'altType' => $altType,
    ];

    $mockApiResponse = ['number' => 'INV-001'];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('invoices/generate-invoice-number', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->generateNumber($altId, $altType);
    expect($result)->toBe($mockApiResponse);
});

it('can get an invoice', function () {
    $invoiceId = 'inv_1';
    $params = ['some' => 'param'];
    $mockApiResponse = ['invoice' => []]; // Assuming response structure
    $mockResponse = Response::from($mockApiResponse);

    // Note: The source code uses PUT to get invoice details?
    // Code: $payload = Payload::put("invoices/{$invoiceId}/", $params);
    $expectedPayload = Payload::put("invoices/{$invoiceId}/", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->get($invoiceId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can update an invoice', function () {
    $invoiceId = 'inv_1';
    $params = ['status' => 'draft'];
    $mockApiResponse = ['invoice' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("invoices/{$invoiceId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->update($invoiceId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete an invoice', function () {
    $invoiceId = 'inv_1';
    $altId = 'loc_1';
    $altType = 'location';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("invoices/{$invoiceId}?altId={$altId}&altType={$altType}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->delete($invoiceId, $altId, $altType);
    expect($result)->toBe($mockApiResponse);
});

it('can void an invoice', function () {
    $invoiceId = 'inv_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = [
        'altId' => $altId,
        'altType' => $altType,
    ];

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/{$invoiceId}/void/", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->void($invoiceId, $altId, $altType);
    expect($result)->toBe($mockApiResponse);
});

it('can send an invoice', function () {
    $invoiceId = 'inv_1';
    $params = ['email' => 'test@example.com'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/{$invoiceId}/send/", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->send($invoiceId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can record payment', function () {
    $invoiceId = 'inv_1';
    $params = ['amount' => 100];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/{$invoiceId}/record-payment", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->recordPayment($invoiceId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create an invoice', function () {
    $params = ['title' => 'New Invoice'];
    $mockApiResponse = ['invoice' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('invoices/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list invoices', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $limit = '10';
    $offset = '0';
    $params = ['status' => 'all'];
    
    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
        'limit' => $limit,
        'offset' => $offset,
    ]);

    $mockApiResponse = ['invoices' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('invoices/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->invoice->list($altId, $altType, $limit, $offset, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get sub-resources', function () {
    expect($this->invoice->template())->toBeInstanceOf(Template::class);
    expect($this->invoice->schedule())->toBeInstanceOf(Schedule::class);
    expect($this->invoice->text2pay())->toBeInstanceOf(Text2pay::class);
});
