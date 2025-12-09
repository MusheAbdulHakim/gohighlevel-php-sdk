<?php

use MusheAbdulHakim\GoHighLevel\Resources\MediaLibrary\MediaLibrary;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->mediaLibrary = new MediaLibrary($this->transporter);
});

it('can delete media', function () {
    $id = 'media_1';
    $altId = 'loc_1';
    $altType = 'location';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("medias/{$id}?altType={$altType}&altId={$altId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->mediaLibrary->delete($id, $altId, $altType);
    expect($result)->toBe($mockApiResponse);
});

it('can upload media', function () {
    $params = ['file' => 'content'];
    $mockApiResponse = ['uploaded' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('medias/upload-file', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->mediaLibrary->upload($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list media', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $sortBy = 'date';
    $sortOrder = 'desc';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
        'sortBy' => $sortBy,
        'sortOrder' => $sortOrder,
    ]);

    $mockApiResponse = ['files' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('medias/files', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->mediaLibrary->list($altId, $altType, $sortBy, $sortOrder, $params);
    expect($result)->toBe($mockApiResponse);
});
