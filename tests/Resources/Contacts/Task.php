<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Task;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->task = new Task($this->transporter);
});

it('can list tasks', function () {
    $contactId = '123';
    $mockApiResponse = ['tasks' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("contacts/{$contactId}/tasks");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->task->list($contactId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a task', function () {
    $contactId = '123';
    $params = ['title' => 'New Task'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create("contacts/{$contactId}/tasks", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->task->create($contactId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a task', function () {
    $contactId = '123';
    $taskId = 'task_1';
    $mockApiResponse = ['task' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("contacts/{$contactId}/tasks/{$taskId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->task->get($contactId, $taskId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a task', function () {
    $contactId = '123';
    $taskId = 'task_1';
    $params = ['title' => 'Updated Task'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("contacts/{$contactId}/tasks/{$taskId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->task->update($contactId, $taskId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a task', function () {
    $contactId = '123';
    $taskId = 'task_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete("contacts/{$contactId}/tasks/", $taskId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->task->delete($contactId, $taskId);
    expect($result)->toBe($mockApiResponse);
});

it('can mark task as completed', function () {
    $contactId = '123';
    $taskId = 'task_1';
    $completed = true;
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("contacts/{$contactId}/tasks/{$taskId}/completed", [
        'completed' => $completed,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->task->completed($contactId, $taskId, $completed);
    expect($result)->toBe($mockApiResponse);
});
