## Courses Api

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
```
### Import Courses
```php

    $data = $client->courses()->import(string $locationId, string $userId, [
        //products
    ]);
```