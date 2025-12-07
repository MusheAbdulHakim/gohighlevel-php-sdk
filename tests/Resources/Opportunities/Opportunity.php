<?php

use MusheAbdulHakim\GoHighLevel\Resources\Opportunities\Opportunity;
use MusheAbdulHakim\GoHighLevel\Resources\Opportunities\Follower;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->opportunity = new Opportunity($this->transporter);
});

it('can get an opportunity', function () {
    $id = 'opp_1';
    $mockApiResponse = ['opportunity' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("opportunities/{$id}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->get($id);
    expect($result)->toBe($mockApiResponse);
});

it('can delete an opportunity', function () {
    $id = 'opp_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('opportunities/', $id);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->delete($id);
    expect($result)->toBe($mockApiResponse);
});

it('can update an opportunity', function () {
    $id = 'opp_1';
    $params = ['name' => 'Updated'];
    $mockApiResponse = ['opportunity' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("opportunities/{$id}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->update($id, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can update opportunity status', function () {
    $id = 'opp_1';
    $status = 'won';
    $params = ['status' => $status];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("opportunities/{$id}/status", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->updateStatus($id, $status);
    expect($result)->toBe($mockApiResponse);
});

it('can upsert an opportunity', function () {
    $pipelineId = 'pipe_1';
    $locationId = 'loc_1';
    $contactId = 'cont_1';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'pipelineId' => $pipelineId,
        'locationId' => $locationId,
        'contactId' => $contactId,
    ]);

    $mockApiResponse = ['opportunity' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('opportunities/upsert', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->upsert($pipelineId, $locationId, $contactId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can create an opportunity', function () {
    $params = ['name' => 'New Opp'];
    $mockApiResponse = ['opportunity' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('opportunities', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can search opportunities', function () {
    $locationId = 'loc_1';
    $params = ['query' => 'foo'];
    $expectedParams = array_merge($params, ['location_id' => $locationId]);

    $mockApiResponse = ['opportunities' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('opportunities/search', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->search($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get pipelines', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['pipelines' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('opportunities/pipelines', ['locationId' => $locationId]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->opportunity->pipelines($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can get follower resource', function () {
    expect($this->opportunity->follower())->toBeInstanceOf(Follower::class);
});
