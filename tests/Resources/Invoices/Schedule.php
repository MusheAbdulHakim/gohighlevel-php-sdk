<?php

use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Schedule;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->schedule = new Schedule($this->transporter);
});

it('can create a schedule', function () {
    $params = ['date' => '2023-01-01'];
    $mockApiResponse = ['schedule' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('invoices/schedule/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list schedules', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $limit = '10';
    $offset = '0';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
        'limit' => $limit,
        'offset' => $offset,
    ]);

    $mockApiResponse = ['schedules' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('invoices/schedule/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->list($altId, $altType, $limit, $offset, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a schedule', function () {
    $scheduleId = 'sch_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = [
        'altId' => $altId,
        'altType' => $altType,
    ];

    $mockApiResponse = ['schedule' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("invoices/schedule/{$scheduleId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->get($scheduleId, $altId, $altType);
    expect($result)->toBe($mockApiResponse);
});

it('can update a schedule', function () {
    $scheduleId = 'sch_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['date' => '2023-01-02'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['schedule' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("invoices/schedule/{$scheduleId}", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->update($scheduleId, $altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a schedule', function () {
    $scheduleId = 'sch_1';
    $altId = 'loc_1';
    $altType = 'location';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("invoices/schedule/{$scheduleId}?altId={$altId}&altType={$altType}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->delete($scheduleId, $altId, $altType);
    expect($result)->toBe($mockApiResponse);
});

it('can schedule invoice', function () {
    $scheduleId = 'sch_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/schedule/{$scheduleId}/schedule", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->invoice($scheduleId, $altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can schedule auto payment', function () {
    $scheduleId = 'sch_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
    ]);

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/schedule/{$scheduleId}/auto-payment", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->autoPayment($scheduleId, $altId, $altType, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can cancel schedule', function () {
    $scheduleId = 'sch_1';
    $altId = 'loc_1';
    $altType = 'location';
    $params = [
        'altId' => $altId,
        'altType' => $altType,
    ];

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post("invoices/schedule/{$scheduleId}/cancel", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->schedule->cancel($scheduleId, $altId, $altType);
    expect($result)->toBe($mockApiResponse);
});
