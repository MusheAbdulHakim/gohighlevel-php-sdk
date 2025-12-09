<?php

use MusheAbdulHakim\GoHighLevel\Resources\Forms\Form;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->form = new Form($this->transporter);
});

it('can get submissions', function () {
    $locationId = 'loc_1';
    $params = ['page' => 1];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['submissions' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('forms/submissions', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->form->submissions($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can upload to custom fields', function () {
    $locationId = 'loc_1';
    $contactId = 'cont_1';

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    // Note: The source code uses query params in URL for POST request without body?
    // Code: Payload::post("forms/upload-custom-files?contactId=$contactId&locationId=$locationId");
    $expectedPayload = Payload::post("forms/upload-custom-files?contactId={$contactId}&locationId={$locationId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->form->uploadToCustomFields($locationId, $contactId);
    expect($result)->toBe($mockApiResponse);
});

it('can list forms', function () {
    $locationId = 'loc_1';
    $params = ['limit' => 10];

    $mockApiResponse = ['forms' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("forms/?locationId={$locationId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->form->list($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
