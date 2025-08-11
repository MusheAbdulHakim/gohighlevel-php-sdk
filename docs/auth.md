## [Authorization Of the user](https://highlevel.stoplight.io/docs/integrations/a04191c0fabf9-authorization)

### `OAuth`

The `OAuth` class provides methods to handle the GoHighLevel OAuth 2.0 authentication flow, allowing you to manage access tokens and permissions for your application. It includes functionality for requesting tokens, retrieving tokens for agencies, and checking installed locations.

---


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

### `get(string $client_id, string $client_secret, string $grant_type, array $params = []): Response`

This method is used to **exchange an authorization code for an access token** or to refresh an existing access token. It corresponds to the `POST /oauth/token` endpoint in the GoHighLevel API.

#### Parameters

| Parameter      | Type   | Description                                                               |
|----------------|--------|---------------------------------------------------------------------------|
| `$client_id`   | `string` | Your application's Client ID.                                             |
| `$client_secret` | `string` | Your application's Client Secret.                                       |
| `$grant_type`    | `string` | The grant type, typically `authorization_code` or `refresh_token`.         |
| `$params`      | `array`  | An array of additional parameters, such as `code` or `refresh_token`. |

#### Usage Example

**1. Exchanging an Authorization Code for an Access Token**

```php
use MusheAbdulHakim\GoHighLevel\GoHighLevel;

// Assuming you have received the authorization code from the callback URL
$authorizationCode = 'your_authorization_code_here';

$client = GoHighLevel::client('YOUR_API_KEY');

$params = [
    'redirect_uri' => 'https://your-app.com/callback',
    'code'         => $authorizationCode,
];

try {
    $response = $client->oAuth()->get(
        'YOUR_CLIENT_ID',
        'YOUR_CLIENT_SECRET',
        'authorization_code',
        $params
    );

    $accessToken = $response->get('access_token');
    $refreshToken = $response->get('refresh_token');

    echo "Access Token: " . $accessToken . "\n";
    echo "Refresh Token: " . $refreshToken . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
````

**2. Using a Refresh Token to Get a New Access Token**

```php
use MusheAbdulHakim\GoHighLevel\GoHighLevel;

// Assuming you have a stored refresh token
$refreshToken = 'your_stored_refresh_token_here';

$client = GoHighLevel::client('YOUR_API_KEY');

$params = [
    'refresh_token' => $refreshToken,
];

try {
    $response = $client->oAuth()->get(
        'YOUR_CLIENT_ID',
        'YOUR_CLIENT_SECRET',
        'refresh_token',
        $params
    );

    $newAccessToken = $response->get('access_token');
    $newRefreshToken = $response->get('refresh_token');

    echo "New Access Token: " . $newAccessToken . "\n";
    echo "New Refresh Token: " . $newRefreshToken . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

-----



### `AcessFromAgency(string $companyId, string $locationId): array|string`

This method retrieves a location-specific access token for an agency. This is a specialized call for managing sub-accounts. It corresponds to the `POST /oauth/locationToken` endpoint.

#### Parameters

| Parameter    | Type   | Description                                           |
|--------------|--------|-------------------------------------------------------|
| `$companyId` | `string` | The ID of the agency's company.                       |
| `$locationId`  | `string` | The ID of the specific location within the agency.    |

#### Usage Example

```php
use MusheAbdulHakim\GoHighLevel\GoHighLevel;

$client = GoHighLevel::client('AGENCY_API_KEY');

$companyId = 'your_agency_company_id';
$locationId = 'your_location_id';

try {
    $response = $client->oAuth()->AcessFromAgency($companyId, $locationId);
    print_r($response);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

-----

### `appLocation(string $appId, string $companyId, array $params = []): array|string`

This method is an alias for the `location` method and is used to retrieve the installed locations for a specific application. It corresponds to the `GET /oauth/installedLocations` endpoint.

#### Parameters

| Parameter   | Type   | Description                                                                     |
|-------------|--------|---------------------------------------------------------------------------------|
| `$appId`    | `string` | The ID of the application.                                                      |
| `$companyId`| `string` | The ID of the agency's company.                                               |
| `$params`   | `array`  | Optional query parameters to filter the results.                                |

#### Usage Example

```php
use MusheAbdulHakim\GoHighLevel\GoHighLevel;

$client = GoHighLevel::client('AGENCY_API_KEY');

$appId = 'your_app_id';
$companyId = 'your_agency_company_id';

try {
    $installedLocations = $client->oAuth()->appLocation($appId, $companyId);
    print_r($installedLocations);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

-----

### `location(string $appId, string $companyId, array $params = []): array|string`

This is the primary method for retrieving the locations where a specific application is installed. It functions identically to `appLocation`.

#### Parameters

| Parameter   | Type   | Description                                                                     |
|-------------|--------|---------------------------------------------------------------------------------|
| `$appId`    | `string` | The ID of the application.                                                      |
| `$companyId`| `string` | The ID of the agency's company.                                               |
| `$params`   | `array`  | Optional query parameters to filter the results.                                |

#### Usage Example

```php
use MusheAbdulHakim\GoHighLevel\GoHighLevel;

$client = GoHighLevel::client('AGENCY_API_KEY');

$appId = 'your_app_id';
$companyId = 'your_agency_company_id';

try {
    $installedLocations = $client->oAuth()->location($appId, $companyId);
    print_r($installedLocations);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```
