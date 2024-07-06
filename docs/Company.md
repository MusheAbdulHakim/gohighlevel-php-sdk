## Companies Api

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
```
### Get Company
```php

    $company = $client->companies()->get(string $companyId);
```