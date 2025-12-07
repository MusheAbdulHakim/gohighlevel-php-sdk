<?php

use MusheAbdulHakim\GoHighLevel\Resources\Campaigns\Campaign;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->campaign = new Campaign($this->transporter);
});

it('can get campaigns', function () {
    $locationId = 'loc_1';
    $params = ['status' => 'published'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['campaigns' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('campaigns/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->campaign->get($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
