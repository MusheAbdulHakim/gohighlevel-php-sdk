## Trigger Links API

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->triggerLinks();
```



### Update Link
```php

    $response = $client->update($linkId, [
        //parameters
    ]);
```


### Get Link
```php

    $response = $client->get($locationId);
```


### Create Link
```php

    $response = $client->create([
        //parameters
    ]);
```