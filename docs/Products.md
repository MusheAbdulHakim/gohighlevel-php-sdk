## [Products Api](https://highlevel.stoplight.io/docs/integrations/486b7c90818f4-products-api)

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->products();
```
### Get Product by ID
```php

    $productId = '6578278e879ad2646715ba9c';
    $data = $client->get($productId, [
        //parameters
    ]);
```

### Delete Product by ID
```php

    $productId = '6578278e879ad2646715ba9c';
    $data = $client->delete($productId, [
        //parameters
    ]);
```

### Update Product by ID
```php

    $productId = '6578278e879ad2646715ba9c';
    $data = $client->update($productId, [
        //parameters
    ]);
```

### Create Product
```php

    $data = $client->create([
        //parameters
    ]);
```

### List Products
```php

    $data = $client->list($locationId, [
        //parameters
    ]);
```


## Products Prices Api

```php

    $price = $client->price();
```

### Create Price for a Product
```php

    $data = $price->create($productId, [
        //parameters
    ]);
```

### List Prices for a Product
```php

    $data = $price->list($productId, $locationId, [
        //parameters
    ]);
```

### Get Price by ID for a Product
```php

    $data = $price->get($productId, $priceId, [
        //parameters
    ]);
```

### Update Price by ID for a Product
```php

    $data = $price->update($productId, $priceId, [
        //parameters
    ]);
```

### Delete Price by ID for a Product
```php

    $data = $price->delete($productId, $priceId, [
        //parameters
    ]);
```

