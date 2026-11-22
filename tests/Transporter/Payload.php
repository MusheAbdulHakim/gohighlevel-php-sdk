<?php

declare(strict_types=1);

use MusheAbdulHakim\GoHighLevel\Enums\Transporter\ContentType;
use MusheAbdulHakim\GoHighLevel\Enums\Transporter\Method;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\BaseUri;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Headers;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\QueryParams;
use Psr\Http\Message\RequestInterface;

/**
 * Builds the PSR-7 request for the given payload, mirroring the way the
 * transporter does it in production.
 */
function payloadToRequest(Payload $payload, array $queryParams = []): RequestInterface
{
    $query = QueryParams::create();

    foreach ($queryParams as $name => $value) {
        $query = $query->withParam($name, $value);
    }

    return $payload->toRequest(
        BaseUri::from('https://services.leadconnectorhq.com'),
        Headers::create(),
        $query,
    );
}

it('sends a json body on PUT requests', function () {
    $params = ['name' => 'Custom Value', 'value' => '123'];

    $request = payloadToRequest(Payload::put('locations/loc_1/customValues/cv_1', $params));

    expect($request->getMethod())->toBe('PUT')
        ->and((string) $request->getBody())->toBe(json_encode($params, JSON_THROW_ON_ERROR))
        ->and($request->getHeaderLine('Content-Type'))->toBe('application/json');
});

it('sends a json body on PATCH requests', function () {
    $params = ['name' => 'Renamed Value'];

    $request = payloadToRequest(Payload::patch('locations/loc_1/customValues/cv_1', $params));

    expect($request->getMethod())->toBe('PATCH')
        ->and((string) $request->getBody())->toBe(json_encode($params, JSON_THROW_ON_ERROR))
        ->and($request->getHeaderLine('Content-Type'))->toBe('application/json');
});

it('keeps sending a json body on POST requests', function () {
    $params = ['name' => 'Custom Value'];

    $request = payloadToRequest(Payload::post('locations/loc_1/customValues', $params));

    expect($request->getMethod())->toBe('POST')
        ->and((string) $request->getBody())->toBe(json_encode($params, JSON_THROW_ON_ERROR));
});

it('sends a json body on custom PUT and PATCH requests', function (Method $method) {
    $params = ['name' => 'Custom Value'];

    $request = payloadToRequest(Payload::custom($method, ContentType::JSON, 'locations/loc_1/customValues/cv_1', $params));

    expect($request->getMethod())->toBe($method->value)
        ->and((string) $request->getBody())->toBe(json_encode($params, JSON_THROW_ON_ERROR));
})->with([Method::PUT, Method::PATCH]);

it('does not send a json body on GET requests and puts the parameters in the query string', function () {
    $params = ['locationId' => 'loc_1'];

    $request = payloadToRequest(Payload::list('locations/loc_1/customValues', $params));

    expect($request->getMethod())->toBe('GET')
        ->and((string) $request->getBody())->toBe('')
        ->and($request->getUri()->getQuery())->toBe(http_build_query($params));
});

it('does not send a json body on DELETE requests', function () {
    $request = payloadToRequest(Payload::delete('locations/loc_1/customValues', 'cv_1'));

    expect($request->getMethod())->toBe('DELETE')
        ->and((string) $request->getBody())->toBe('');
});

it('still builds a multipart body when the content type is multipart', function () {
    $payload = Payload::custom(
        Method::POST,
        ContentType::MULTIPART,
        'medias/upload-file',
        ['file' => 'some-file-content', 'hosted' => 'false']
    );

    $request = payloadToRequest($payload);

    expect($request->getMethod())->toBe('POST')
        ->and($request->getHeaderLine('Content-Type'))->toContain('multipart/form-data; boundary=')
        ->and((string) $request->getBody())->toContain('some-file-content');
});
