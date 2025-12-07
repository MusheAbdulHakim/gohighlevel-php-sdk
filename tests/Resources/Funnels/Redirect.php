<?php

use MusheAbdulHakim\GoHighLevel\Resources\Funnels\Redirect;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->redirect = new Redirect($this->transporter);
});

it('can create a redirect', function () {
    $params = ['url' => 'http://example.com'];
    $mockApiResponse = ['redirect' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('funnels/lookup/redirect', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->redirect->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can update a redirect', function () {
    $id = 'red_1';
    $params = ['url' => 'http://new.com'];
    $mockApiResponse = ['redirect' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::patch("funnels/lookup/redirect/{$id}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->redirect->update($id, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can list redirects', function () {
    $locationId = 'loc_1';
    $params = ['limit' => 10];

    $mockApiResponse = ['redirects' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("funnels/lookup/redirect/list?locationId={$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->redirect->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a redirect', function () {
    $id = 'red_1';
    $locationId = 'loc_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("funnels/lookup/redirect/{$id}?locationId={$locationId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->redirect->delete($id, $locationId);
    expect($result)->toBe($mockApiResponse);
});
