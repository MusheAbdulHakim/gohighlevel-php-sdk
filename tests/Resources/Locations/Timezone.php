<?php

use MusheAbdulHakim\GoHighLevel\Resources\Locations\Timezone;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->timezone = new Timezone($this->transporter);
});

it('can list timezones', function () {
    $locationId = 'loc_1';
    $mockApiResponse = ['timezones' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("locations/{$locationId}/timezones");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->timezone->list($locationId);
    expect($result)->toBe($mockApiResponse);
});
