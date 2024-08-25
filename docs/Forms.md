## Forms Api

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->forms();
```
### Get Forms Submissions
```php

    $data = $client->submissions(string $locationId, [
        //parameters
    ]);
```

### Upload files to custom fields
```php

    $data = $client->uploadToCustomFields(string $locationId, string $contactId,[
        //parameters
    ]);
```

### Get Forms
```php

    $data = $client->list(string $locationId, [
        //parameters
    ]);
```

