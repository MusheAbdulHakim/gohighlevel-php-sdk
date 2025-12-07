<?php

use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Appointment;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->appointment = new Appointment($this->transporter);
});

it('can get appointments for a contact', function () {
    $contactId = 'contact_123';
    $mockResponseData = ['appointments' => []];
    $mockApiResponse = ['appointments' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("contacts/{$contactId}/appointments");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->appointment->contacts($contactId);

    expect($result)->toBe($mockApiResponse);
});
