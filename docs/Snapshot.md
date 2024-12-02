## [Snapshots API](https://highlevel.stoplight.io/docs/integrations/ff808584bafce-snapshots-api)

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->snapshot();
```

### Get Snapshots
```php

    $params = [
        'companyId' => '5D112kQsiKESj6rash'
    ];

    $data = $client->list($params);
```

### Create Snapshot Share Link
```php

    $params = [
        
    ];
    $data = $client->create($companyId, $params);
```

### Get Snapshot Push between Dates
```php

    $params = [
        
    ];
    $data = $client->between($snapshotId, $from, $to, $params);
```

### Get Last Snapshot Push
```php

    $params = [
        
    ];
    $data = $client->get($snapshotId, $locationId);
```

