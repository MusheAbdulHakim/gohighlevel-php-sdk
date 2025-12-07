<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Campaign;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->campaign = new Campaign($this->transporter);
});

it('can create a campaign for a contact', function () {
    $contactId = 'contact_123';
    $campaignId = 'campaign_123';

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::modify("contacts/{$contactId}/campaigns/", $campaignId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->campaign->create($contactId, $campaignId);

    expect($result)->toBe($mockApiResponse);
});

it('can add a contact to a campaign', function () {
    $contactId = 'contact_123';
    $campaignId = 'campaign_123';

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::modify("contacts/{$contactId}/campaigns/", $campaignId);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->campaign->add($contactId, $campaignId);

    expect($result)->toBe($mockApiResponse);
});

it('can remove a contact from a campaign', function () {
    $contactId = 'contact_123';
    $campaignId = 'campaign_123';

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("contacts/{$contactId}/campaigns/{$campaignId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->campaign->removeContact($contactId, $campaignId);

    expect($result)->toBe($mockApiResponse);
});

it('can remove a contact from all campaigns', function () {
    $contactId = 'contact_123';

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("contacts/{$contactId}/campaigns/removeAll");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->campaign->removeContactFromAll($contactId);

    expect($result)->toBe($mockApiResponse);
});
