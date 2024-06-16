## [Business Api](https://highlevel.stoplight.io/docs/integrations/bb6b717cac89c-business-api)

```php

<?php
include 'vendor/autoload.php';

$version = '2021-04-15';
$access_token = '';

$ghl = \MusheAbdulHakim\GoHighLevel\GoHighLevel::client($access_token, $version);

```

## Update Business

```php
$queryParams = [];
$appLocation = $ghl->businesses()->update('businessId',$queryParams);
```

## Delete Busienss

```php
$businessId = '';
$ghl->businesses()->delete($businessId);
```

```php
$businessId = '';
$ghl->businesses()->get($businessId);
```

## Get Businesses by Location

```php
$locationId = '';
$getBusinessByLocation = $ghl->businesses()->getByLocation($locationId);

```

## Create Business

```php
$name = 'business name';
$locationId = '';
$business = $ghl->businesses()->create($name, $locationId, [
// other attributes
]);
```

### Response

```php
 MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response {#36 ▼
  -data: array:3 [▼
    "success" => true
    "businesses" => []
    "traceId" => "xxxxxxxxxxxxx"
  ]
}
```
