## [Authorization Of the user](https://highlevel.stoplight.io/docs/integrations/a04191c0fabf9-authorization)

### Redirect the user to authorize

```php
include 'vendor/autoload.php';

$client_id = "";
$client_secret = "";
$scopes = "";
$callback = "" //callback url
$auth_url = "https://marketplace.gohighlevel.com"; // use: https://marketplace.leadconnectorhq.com for whitelabel 

$url = "$auth_url/oauth/chooselocation?response_type=code&redirect_uri=$callback&client_id=$client_id&scope=$scopes";
echo header("Location: $url");

```

## [Get Access Token](https://highlevel.stoplight.io/docs/integrations/00d0c0ecaa369-get-access-token)

```php
$ghl_access = \MusheAbdulHakim\GoHighLevel\GoHighLevel::getAccessToken('https://services.leadconnectorhq.com/oauth/token', 'application/x-www-form-urlencoded', [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code // code obtained from the authorization,
    'redirect_uri' => $callback,
]);

```

## [Get Location Access Token from Agency Token](https://highlevel.stoplight.io/docs/integrations/1a30b217da571-get-location-access-token-from-agency-token)

```php
$client->oAuth()->AcessFromAgency($companyId, $locationId)
```

## [Get Location Where App is installed](https://highlevel.stoplight.io/docs/integrations/aeed19d08490e-get-location-where-app-is-installed)

```php
$client = \MusheAbdulHakim\GoHighLevel\GoHighLevel::client($key, '2021-07-28');
$location = $client->oAuth()->location($appId, $companyId)
```

or

```php
$location = $client->oAuth()->appLocation($appId, $companyId);
```
