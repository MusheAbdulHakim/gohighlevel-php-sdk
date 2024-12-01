## [Payments API](https://highlevel.stoplight.io/docs/integrations/ad461c1eb08ab-payments-api)

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->payments();
```

### Integrations
```php

    $integrations = $client->integration();
```

#### Create White-label Integration Provider

```php

    $data = $integrations->create([
        //params
    ]);
```

#### Create White-label Integration Provider

```php

    $data = $integrations->list($altId, $altType, [
        //params
    ]);
```


### Orders
```php

    $orders = $client->order();
```

#### List Orders

```php

    $data = $orders->list($altId, $altType, [
        //params
    ]);
```

#### Get Order by ID

```php

    $data = $orders->get($orderId, [
        //params
    ]);
```



### Order Fulfillments
```php

    $fulfillment = $client->orderFulfillment();
```


#### Create order fulfillment

```php

    $data = $fulfillment->create($orderId, [
        //params
    ]);
```


#### list order fulfillment

```php

    $data = $fulfillment->list($orderId, [
        //params
    ]);
```



### Transactions
```php

    $transaction = $client->transaction();
```

#### List Transactions

```php

    $data = $transaction->list($altId, $altType, [
        //params
    ]);
```


#### Get Transaction by ID

```php

    $data = $transaction->get($transactionId, $altId, $altType, [
        //params
    ]);
```



### Subscriptions
```php

    $subscription = $client->subscription();
```

#### List Subscriptions

```php

    $data = $subscription->list($altId, $altType, [
        //params
    ]);
```

#### Get Subscription by ID

```php

    $data = $subscription->get($subscriptionId, $altId, $altType, [
        //params
    ]);
```


### Custom Provider
```php

    $customProvider = $client->customProvider();
```

#### Create new integration

```php

    $data = $customProvider->create($locationId, [
        //params
    ]);
```

#### Deleting an existing integration

```php

    $data = $customProvider->delete($locationId);
```


#### Fetch given provider config

```php

    $data = $customProvider->getConfig($locationId);
```


#### Create new provider config

```php

    $data = $customProvider->createConfig($locationId,[
        //parameters
    ]);
```


#### Disconnect existing provider config

```php

    $data = $customProvider->disconnectConfig($locationId, $liveMode);
```
or

```php

    $data = $customProvider->deleteConfig($locationId, $liveMode);
```

