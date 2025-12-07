<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Workflow;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->workflow = new Workflow($this->transporter);
});

it('can create a workflow', function () {
    $contactId = '123';
    $workflowId = 'wf_1';
    $eventStartTime = '2023-01-01';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("contacts/{$contactId}/workflow/{$workflowId}", [
        'eventStartTime' => $eventStartTime,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->workflow->create($contactId, $workflowId, $eventStartTime);
    expect($result)->toBe($mockApiResponse);
});

it('can add a workflow alias', function () {
    $contactId = '123';
    $workflowId = 'wf_1';
    $eventStartTime = '2023-01-01';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("contacts/{$contactId}/workflow/{$workflowId}", [
        'eventStartTime' => $eventStartTime,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->workflow->add($contactId, $workflowId, $eventStartTime);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a workflow', function () {
    $contactId = '123';
    $workflowId = 'wf_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("contacts/{$contactId}/workflow/{$workflowId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->workflow->delete($contactId, $workflowId);
    expect($result)->toBe($mockApiResponse);
});
