<?php

use MusheAbdulHakim\GoHighLevel\Client;
use MusheAbdulHakim\GoHighLevel\Factory;
use Psr\Http\Client\ClientInterface;

it('can create a client with an API key', function () {
    $client = (new Factory())->withApiKey('test_api_key')->make();

    expect($client)->toBeInstanceOf(Client::class);
});

it('can create a client with a custom HTTP client', function () {
    $httpClient = Mockery::mock(ClientInterface::class);

    $client = (new Factory())->withHttpClient($httpClient)->make();

    expect($client)->toBeInstanceOf(Client::class);
});

it('can create a client with a custom base URI', function () {
    $client = (new Factory())->withBaseUri('https://example.com')->make();

    expect($client)->toBeInstanceOf(Client::class);
});

it('can create a client with a custom HTTP header', function () {
    $client = (new Factory())->withHttpHeader('X-Custom-Header', 'test_value')->make();

    expect($client)->toBeInstanceOf(Client::class);
});

it('can create a client with a custom query parameter', function () {
    $client = (new Factory())->withQueryParam('test_param', 'test_value')->make();

    expect($client)->toBeInstanceOf(Client::class);
});
