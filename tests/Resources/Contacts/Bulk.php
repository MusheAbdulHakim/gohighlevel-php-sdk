<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Bulk;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->bulk = new Bulk($this->transporter);
});

it('can add or remove bulk contacts', function () {
    $locationId = 'location_123';
    $ids = ['contact_1', 'contact_2'];
    $businessId = 'business_123';
    
    $params = [
        'locationId' => $locationId,
        'ids' => $ids,
        'businessId' => $businessId,
    ];

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('contacts/bulk/business', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->bulk->addOrRemove($locationId, $ids, $businessId);

    expect($result)->toBe($mockApiResponse);
});
