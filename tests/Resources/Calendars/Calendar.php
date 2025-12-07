<?php

use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Calendar;
use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Group;
use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Event;
use MusheAbdulHakim\GoHighLevel\Resources\Calendars\CalendarResource;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->calendar = new Calendar($this->transporter);
});

it('can get slots', function () {
    $calendarId = 'cal_1';
    $startDate = '2023-01-01';
    $endDate = '2023-01-02';
    $params = ['timezone' => 'UTC'];
    $expectedParams = array_merge($params, ['startDate' => $startDate, 'endDate' => $endDate]);

    $mockApiResponse = ['slots' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("calendars/{$calendarId}/free-slots", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->slots($calendarId, $startDate, $endDate, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can update a calendar', function () {
    $calendarId = 'cal_1';
    $params = ['name' => 'Updated Calendar'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("calendars/{$calendarId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->update($calendarId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a calendar', function () {
    $calendarId = 'cal_1';
    $mockApiResponse = ['calendar' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("calendars/{$calendarId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->get($calendarId);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a calendar', function () {
    $calendarId = 'cal_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("calendars/{$calendarId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->delete($calendarId);
    expect($result)->toBe($mockApiResponse);
});

it('can list calendars', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['calendars' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('calendars/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get calendars alias', function () {
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['calendars' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('calendars/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->getCalendars($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create a calendar', function () {
    $locationId = 'loc_1';
    $name = 'New Calendar';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['locationId' => $locationId, 'name' => $name]);

    $mockApiResponse = ['calendar' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('calendars/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->calendar->create($locationId, $name, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get sub-resources', function () {
    expect($this->calendar->groups())->toBeInstanceOf(Group::class);
    expect($this->calendar->events())->toBeInstanceOf(Event::class);
    expect($this->calendar->resources())->toBeInstanceOf(CalendarResource::class);
});
