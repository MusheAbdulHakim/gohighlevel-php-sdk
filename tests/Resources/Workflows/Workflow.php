<?php

use MusheAbdulHakim\GoHighLevel\Resources\Workflows\Workflow;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->workflow = new Workflow($this->transporter);
});

it('can get workflows', function () {
    $locationId = 'loc_1';
    $params = ['locationId' => $locationId];
    $mockApiResponse = ['workflows' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('workflows/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->workflow->get($locationId);
    expect($result)->toBe($mockApiResponse);
});
