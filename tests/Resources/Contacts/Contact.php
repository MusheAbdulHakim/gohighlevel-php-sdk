<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Contact;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Task;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Appointment;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Tag;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Note;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Campaign;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Workflow;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Search;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Follower;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->contact = new Contact($this->transporter);
});

it('can get a contact', function () {
    $contactId = '123';
    $mockResponseData = ['id' => $contactId];
    $mockApiResponse = ['contact' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("contacts/{$contactId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->get($contactId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a contact', function () {
    $contactId = '123';
    $params = ['email' => 'test@example.com'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("contacts/{$contactId}", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->update($contactId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a contact', function () {
    $contactId = '123';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::delete('contacts/', $contactId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->delete($contactId);
    expect($result)->toBe($mockApiResponse);
});

it('can upsert a contact', function () {
    $params = ['email' => 'test@example.com'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('contacts/upsert', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->upsert($params);
    expect($result)->toBe($mockApiResponse);
});

it('can get contacts by business', function () {
    $businessId = 'business_123';
    $mockApiResponse = ['contacts' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('contacts/business/businessId', [
        'locationId' => $businessId,
    ]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->byBusiness($businessId);
    expect($result)->toBe($mockApiResponse);
});

it('can create a contact', function () {
    $params = ['email' => 'test@example.com'];
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('contacts/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list contacts', function () {
    $locationId = 'loc_123';
    $mockApiResponse = ['contacts' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('contacts/', ['locationId' => $locationId]);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->contact->list($locationId);
    expect($result)->toBe($mockApiResponse);
});

it('can get sub-resources', function () {
    expect($this->contact->tasks())->toBeInstanceOf(Task::class);
    expect($this->contact->appointments())->toBeInstanceOf(Appointment::class);
    expect($this->contact->tags())->toBeInstanceOf(Tag::class);
    expect($this->contact->notes())->toBeInstanceOf(Note::class);
    expect($this->contact->campaign())->toBeInstanceOf(Campaign::class);
    expect($this->contact->workflow())->toBeInstanceOf(Workflow::class);
    expect($this->contact->search())->toBeInstanceOf(Search::class);
    expect($this->contact->followers())->toBeInstanceOf(Follower::class);
});
