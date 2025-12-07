<?php

use MusheAbdulHakim\GoHighLevel\Resources\Courses\Course;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->course = new Course($this->transporter);
});

it('can import courses', function () {
    $locationId = 'loc_1';
    $userId = 'user_1';
    $products = ['prod_1'];
    
    $params = [
        'locationId' => $locationId,
        'userId' => $userId,
        'products' => $products,
    ];

    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::create('courses/courses-exporter/public/import', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->course->import($locationId, $userId, $products);
    expect($result)->toBe($mockApiResponse);
});
