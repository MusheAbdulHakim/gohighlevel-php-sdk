<?php

use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Event;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->event = new Event($this->transporter);
});

it('can list events', function () {
    $locationId = 'loc_1';
    $params = ['startTime' => '123'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['events' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('calendars/events/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get events by time', function () {
    $locationId = 'loc_1';
    $startTime = '123';
    $endTime = '456';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, [
        'locationId' => $locationId,
        'startTime' => $startTime,
        'endTime' => $endTime,
    ]);

    $mockApiResponse = ['events' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('calendars/events/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->get($locationId, $startTime, $endTime, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get blocked slots', function () {
    $locationId = 'loc_1';
    $startTime = '123';
    $endTime = '456';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, [
        'endtime' => $endTime, // Typo in source code "endtime", keeping it as per source
        'startTime' => $startTime,
        'locationId' => $locationId,
    ]);

    $mockApiResponse = ['slots' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('calendars/blocked-slots/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->slots($locationId, $endTime, $startTime, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get appointment', function () {
    $eventId = 'evt_1';
    $mockApiResponse = ['appointment' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("calendars/events/appointments/{$eventId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->getAppointment($eventId);
    expect($result)->toBe($mockApiResponse);
});

it('can edit appointment', function () {
    $eventId = 'evt_1';
    $params = ['title' => 'New Title'];
    $mockApiResponse = ['appointment' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("calendars/events/appointments/{$eventId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->editAppointment($eventId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create appointment', function () {
    $calendarId = 'cal_1';
    $locationId = 'loc_1';
    $contactId = 'cont_1';
    $startTime = '123';
    $params = ['title' => 'New Appt'];

    $expectedParams = array_merge($params, [
        'calendarId' => $calendarId,
        'locationId' => $locationId,
        'contactId' => $contactId,
        'startTime' => $startTime,
    ]);

    $mockApiResponse = ['appointment' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('calendars/events/appointments/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->createAppointment($calendarId, $locationId, $contactId, $startTime, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create blocked slot', function () {
    $locationId = 'loc_1';
    $startTime = '123';
    $endTime = '456';
    $params = ['title' => 'Blocked'];

    $expectedParams = array_merge($params, [
        'locationId' => $locationId,
        'startTime' => $startTime,
        'endTime' => $endTime,
    ]);

    $mockApiResponse = ['slot' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('calendars/events/block-slots', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->createSlot($locationId, $startTime, $endTime, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can edit blocked slot', function () {
    $eventId = 'evt_1';
    $params = ['title' => 'Updated Blocked'];
    $mockApiResponse = ['slot' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("calendars/events/block-slots/{$eventId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->editSlot($eventId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete event', function () {
    $eventId = 'evt_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('calendars/events', $eventId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->event->delete($eventId);
    expect($result)->toBe($mockApiResponse);
});
