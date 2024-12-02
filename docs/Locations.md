## [Sub-Account (Formerly Location) Api](https://highlevel.stoplight.io/docs/integrations/e283eac258a96-location-api)

### Sub-Account (Formerly Location)
```php
$location = GoHighLevel::client($access_token,'2021-07-28')->location();
```

### Create Sub-Account (Formerly Location)

```php

$client = GoHighLevel::client($access_token,'2021-07-28');

 $location = $client->location()->create([
            'name' => $user->name,
            'companyId' => $companyId,
            'email' => $user->email,
        ]);

```

### Get Sub-Account (Formerly Location)
```php
$client = GoHighLevel::client($access_token,'2021-07-28');

$location = $client->location()->get($locationId);
```

### Update Sub-Account (Formerly Location)

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$client->location()->update($locationId, [
    // body
]);
```
### Delete Sub-Account (Formerly Location)

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$client->location()->delete($locationId, [
    // deleteTwilioAccount => true
])
```


### Tags
```php

    $tag = $location->tag();
```


#### Get Tags

```php

    $response = $tag->list($locationId);
```


#### Create Tag


```php

    $response = $tag->create($locationId, [
        //parameters
    ]);
```

#### Get Tag By Id

```php

    $response = $tag->get($locationId, $tagId);
```

#### Update Tag By Id

```php

    $response = $tag->update($locationId, $tagId, [
        
    ]);
```

#### Delete Tag

```php

    $response = $tag->delete($locationId, $tagId);
```




### Custom Field
```php

    $customField = $location->customField();
```

#### Get Custom Fields

```php

    $response = $customField->list($locationId, [
        //parameters
    ]);
```

#### Create Custom Field

```php

    $response = $customField->create($locationId, $name, $dataType, [
        //parameters
    ]);
```

#### Get Custom Field

```php

    $response = $customField->create($locationId, $name, $dataType, [
        //parameters
    ]);
```


#### Update Custom Field

```php

    $response = $customField->update($locationId, $id, [
        //parameters
    ]);
```


#### Delete Custom Field

```php

    $response = $customField->delete($locationId, $id);
```


#### Upload File to a Custom Field

```php

    $response = $customField->upload($locationId, [

    ]);
```



### Custom Value
```php

    $customValue = $location->customValue();
```

#### Get Custom Values

```php

    $response = $customValue->list($locationId);
```

#### Create Custom Value

```php

    $response = $customValue->create($locationId,[
        //parameters
    ]);
```

#### Get Custom Value

```php

    $response = $customValue->get($locationId, $id);
```

#### Update Custom Value

```php

    $response = $customValue->update($locationId, $id, [
        //parameters
    ]);
```

#### Delete Custom Value

```php

    $response = $customValue->delete($locationId, $id);
```


### Template
```php

    $template = $location->template();
```

#### Get all templates

```php

    $response = $template->list($locationId, $originId, [
        //parameters
    ]);
```

#### Delete Template

```php

    $response = $template->delete($locationId, $id);
```

### Search
```php

    $search = $location->search();
```

#### Search Locations

```php

    $response = $template->search([
        //parameters
    ]);

    //or
    $response = $template->query([
        //query parameters
    ]);
```

#### Task Search Filter

```php

    $response = $template->tasks($locationId, [
        //query parameters
    ]);

```


