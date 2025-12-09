<?php

use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Group;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->group = new Group($this->transporter);
});

it('can get groups', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['groups' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('calendars/groups', ['locationId' => $locationId]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->group->get($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a group', function () {
    $params = ['name' => 'Group 1'];
    $mockApiResponse = ['group' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('calendars/groups', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->group->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can validate slug', function () {
    $locationId = 'loc_1';
    $slug = 'slug_1';
    $available = true;

    $expectedParams = [
        'locationId' => $locationId,
        'slug' => $slug,
        'available' => $available,
    ];

    $mockApiResponse = ['valid' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put('calendars/groups/validate-slug', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->group->validate($locationId, $slug, $available);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a group', function () {
    $groupId = 'grp_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('calendars/groups', $groupId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->group->delete($groupId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a group', function () {
    $groupId = 'grp_1';
    $params = ['name' => 'Updated Group'];
    $mockApiResponse = ['group' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("calendars/groups/{$groupId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->group->update($groupId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can disable a group', function () {
    $groupId = 'grp_1';
    $isActive = false;
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("calendars/groups/{$groupId}/status", ['isActive' => $isActive]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->group->disable($groupId, $isActive);
    expect($result)->toBe($mockApiResponse);
});
