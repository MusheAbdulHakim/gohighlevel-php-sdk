<?php

use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Template;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->template = new Template($this->transporter);
});

it('can create a template', function () {
    $params = ['name' => 'Template 1'];
    $mockApiResponse = ['template' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::post('invoices/template/', $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->template->create($params);
    expect($result)->toBe($mockApiResponse);
});

it('can list templates', function () {
    $altId = 'loc_1';
    $altType = 'location';
    $limit = '10';
    $offset = '0';
    $params = ['some' => 'param'];

    $expectedParams = array_merge($params, [
        'altId' => $altId,
        'altType' => $altType,
        'limit' => $limit,
        'offset' => $offset,
    ]);

    $mockApiResponse = ['templates' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get('invoices/template/', $expectedParams);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->template->list($altId, $altType, $limit, $offset, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can get a template', function () {
    $templateId = 'tmpl_1';
    $mockApiResponse = ['template' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::get("invoices/template/{$templateId}/");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->template->get($templateId);
    expect($result)->toBe($mockApiResponse);
});

it('can update a template', function () {
    $templateId = 'tmpl_1';
    $params = ['name' => 'Updated Template'];
    $mockApiResponse = ['template' => []];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::put("invoices/template/{$templateId}/", $params);

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->template->update($templateId, $params);
    expect($result)->toBe($mockApiResponse);
});

it('can delete a template', function () {
    $templateId = 'tmpl_1';
    $mockApiResponse = ['success' => true];
    $mockResponse = Response::from($mockApiResponse);

    $expectedPayload = Payload::deleteFromUri("invoices/template/{$templateId}/");

    $this->transporter
        ->shouldReceive('requestObject')
        ->once()
        ->with(Mockery::on(function (Payload $payload) use ($expectedPayload) {
            return $payload == $expectedPayload;
        }))
        ->andReturn($mockResponse);

    $result = $this->template->delete($templateId);
    expect($result)->toBe($mockApiResponse);
});
