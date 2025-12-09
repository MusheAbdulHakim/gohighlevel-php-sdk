<?php

use MusheAbdulHakim\GoHighLevel\Resources\Companies\Company;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->company = new Company($this->transporter);
});

it('can get a company', function () {
    $companyId = '123';
    $mockResponseData = ['id' => $companyId];
    $mockApiResponse = ['company' => $mockResponseData];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("companies/{$companyId}");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->company->get($companyId);
    expect($result)->toBe($mockApiResponse);
});
