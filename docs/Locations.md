## [Locations Api](https://highlevel.stoplight.io/docs/integrations/e283eac258a96-location-api)

### Create Location

```php

$client = GoHighLevel::client($access_token,'2021-07-28');

 $location = $client->location()->create([
            'name' => $user->name,
            'companyId' => $companyId,
            'email' => $user->email,
        ]);

```

### Get Location
```php
$client = GoHighLevel::client($access_token,'2021-07-28');

$location = $client->location()->get($locationId);
```

### Update Location

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$client->location()->update($locationId, [
    // body
]);
```
### Delete Location

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$client->location()->delete($locationId, [
    // deleteTwilioAccount => true
])
```
