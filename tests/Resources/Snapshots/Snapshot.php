<?php

use MusheAbdulHakim\GoHighLevel\Resources\Snapshots\Snapshot;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->snapshot = new Snapshot($this->transporter);
});

it('can list snapshots', function () {
    $params = ['some' => 'param'];
    $mockApiResponse = ['snapshots' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('snapshots/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->snapshot->list($params);
    expect($result)->toBe($mockApiResponse);
});

it('can create snapshot share link', function () {
    $companyId = 'comp_1';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['companyId' => $companyId]);

    $mockApiResponse = ['link' => 'http://share.link'];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('snapshots/share/link', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->snapshot->create($companyId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get snapshot status between dates', function () {
    $snapshotId = 'snap_1';
    $from = '2023-01-01';
    $to = '2023-01-31';
    $params = ['some' => 'param'];
    $expectedParams = array_merge($params, ['from' => $from, 'to' => $to]);

    $mockApiResponse = ['status' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("snapshots/snapshot-status/{$snapshotId}", $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->snapshot->between($snapshotId, $from, $to, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get snapshot status for location', function () {
    $snapshotId = 'snap_1';
    $locationId = 'loc_1';
    $params = ['some' => 'param'];
    
    $mockApiResponse = ['status' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("snapshots/snapshot-status/{$snapshotId}/location/{$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->snapshot->get($snapshotId, $locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
