## Working with Funnels

```php
$version = '2021-07-28';
$ghl = \MusheAbdulHakim\GoHighLevel\GoHighLevel::init($access_token);
$funnels = $ghl->withVersion($version)
                ->make()
                ->funnel()
                ->list($locationId);

```


```php
$funnel = GoHighLevel::client($access_token,'2021-07-28')->funnel();
```

### Fetch List of Funnels
```php

    $response = $funnels->list($locationId, [
        //parameters
    ]);
```

### Fetch list of funnel pages
```php

    $response = $funnels->pages($funnelId, $locationId, $limit, $offset, [
        //parameters
    ]);
```

### Fetch count of funnel pages
```php

    $response = $funnels->countPages($funnelId, $locationId, [
        //parameters
    ]);
```

### Redirect
```php

    $redirect = $funnels->redirect();
```

#### Create Redirect
```php

    $response = $redirect->create([
        //parameters
    ]);
```

#### Update Redirect By Id
```php

    $response = $redirect->update($id, [
        //parameters
    ]);
```

#### Delete Redirect By Id
```php

    $response = $redirect->delete($id, $locationId);
```

#### Fet List of Redirects
```php

    $response = $redirect->list($locationId,[
        //parameters
    ]);
```