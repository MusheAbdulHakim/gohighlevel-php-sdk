<?php

use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Search;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->search = new Search($this->transporter);
});

it('can search conversations', function () {
    $locationId = 'loc_1';
    $params = ['query' => 'hello'];
    $expectedParams = array_merge($params, ['locationId' => $locationId]);

    $mockApiResponse = ['conversations' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('conversations/search', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->search->make($locationId, $params);
    expect($result)->toBe($mockApiResponse);
});
