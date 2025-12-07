<?php

use MusheAbdulHakim\GoHighLevel\Resources\Users\User;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->user = new User($this->transporter);
});

it('can get a user', function () {
    $userId = '123';
    $mockApiResponse = ['user' => ['id' => $userId]];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("users/{$userId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->user->get($userId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a user', function () {
    $userId = '123';
    $params = ['name' => 'New Name'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("users/{$userId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->user->update($userId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a user', function () {
    $userId = '123';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('users', $userId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->user->delete($userId);
    expect($result)->toBe($mockApiResponse);
});

it('can get users by location', function () {
    $locationId = 'loc_123';
    $mockApiResponse = ['users' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('users/', ['locationId' => $locationId]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->user->byLocation($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a user', function () {
    $companyId = 'comp_123';
    $params = ['name' => 'John Doe'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('users/', array_merge($params, ['companyId' => $companyId]));

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->user->create($companyId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can search users', function () {
    $companyId = 'comp_123';
    $params = ['query' => 'John'];
    $mockApiResponse = ['users' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('users/search', array_merge($params, ['companyId' => $companyId]));

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->user->search($companyId, $params);
    expect($result)->toBe($mockApiResponse);
});
