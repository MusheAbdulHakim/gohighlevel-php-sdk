<?php

use MusheAbdulHakim\GoHighLevel\Client;
use MusheAbdulHakim\GoHighLevel\Factory;
use GuzzleHttp\Client as GuzzleHttpClient;
use MusheAbdulHakim\GoHighLevel\GoHighLevel;

it('may create client', function () {
    $gohighlevel = GoHighLevel::client('key');
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});

it('may create factory', function () {
    $gohighlevel = GoHighLevel::factory();
    expect($gohighlevel)->toBeInstanceOf(Factory::class);
});

it('may initialize factory', function () {
    $gohighlevel = GoHighLevel::init('api_key');
    expect($gohighlevel)->toBeInstanceOf(Factory::class);
});

it('may create client via factory', function () {
    $gohighlevel = GoHighLevel::factory()->make();
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});

it('may create client via init method', function () {
    $gohighlevel = GoHighLevel::init('api_key')->make();
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});


it('may set custom http client', function () {
    $gohighlevel = GoHighLevel::init('foot')
                ->withHttpClient(new GuzzleHttpClient())
                ->make();
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});

it('sets api version', function () {
    $gohighlevel = GoHighLevel::client('foo', '2021-07-28');
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});

it('set custom headers', function () {
    $gohighlevel = GoHighLevel::init('foo')
       ->withHttpHeader('custom-Header', 'foo')
       ->make();
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});

it('set custom query parameters', function () {
    $gohighlevel = GoHighLevel::init('foo')
       ->withQueryParam('param1', 'value')
       ->make();
    expect($gohighlevel)->toBeInstanceOf(Client::class);
});
