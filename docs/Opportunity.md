## Opportunity Api

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$opportunityResource = $client->opportunity();
```
### Get Opportunity
```php

    $opportunity = $opportunityResource->get(string $opportunityId);
```

### Update Opportunity
```php

    $opportunity = $opportunityResource->update(string $opportunityId, [
        //body
    ]);
```
### Update Opportunity Status
```php

    $opportunity = $opportunityResource->updateStatus(string $opportunityId, string $status);
```

### Delete Opportunity
```php

    $opportunity = $opportunityResource->delete(string $opportunityId);
```

### Upsert Opportunity
```php

    $opportunity = $opportunityResource->upsert(string $pipelineId, string $locationId, string $contactId,[
        //body
    ]);
```

### Create Opportunity
```php

    $opportunity = $opportunityResource->create([
        //body
    ]);
```