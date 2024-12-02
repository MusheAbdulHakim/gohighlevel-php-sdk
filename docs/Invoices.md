## Invoices API

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->invoices();
```


### Generate Invoice Number
```php

    $response = $client->generateNumber($altId, $altType);
```


### Get invoice
```php

    $response = $client->get($invoiceId,[
        //parameters
    ]);
```


### Update Invoice
```php

    $response = $client->update($invoiceId,[
        //parameters
    ]);
```


### Delete Invoice
```php

    $response = $client->delete($invoiceId,$altId, $altType);
```


### Void Invoice
```php

    $response = $client->void($invoiceId,$altId, $altType);
```


### Send Invoice
```php

    $response = $client->send($invoiceId,[
        //parameters
    ]);
```


### Record a manual payment for an invoice
```php

    $response = $client->recordPayment($invoiceId,[
        //parameters
    ]);
```


### Create Invoice
```php

    $response = $client->create([
        //parameters
    ]);
```


### List Invoices
```php

    $response = $client->list($altId, $altType, $limit, $offset, [
        //parameters
    ]);
```


### Template
```php

    $template = $client->template
    ();
```

#### Create template
```php

    $response = $template->create([
        //parameters
    ]);
```

#### List templates
```php

    $response = $template->list([
        //parameters
    ]);
```


#### Get template
```php

    $response = $template->get($templateId,[
        //parameters
    ]);
```


#### Update template
```php

    $response = $template->update($templateId, [
        //parameters
    ]);
```


#### Delete template
```php

    $response = $template->delete($templateId);
```


### Schedule
```php

    $schedule = $client->schedule
    ();
```

#### Create Schedule
```php

    $response = $schedule->create([
        //parameters
    ]);
```

#### List Schedule
```php

    $response = $schedule->list($altId, $altType, $limit, $offset,[
        //parameters
    ]);
```

#### Get a  Schedule
```php

    $response = $schedule->get($scheduleId, $altId, $altType);
```

#### Update Schedule
```php

    $response = $schedule->update($scheduleId, $altId, $altType, [
        //parameters
    ]);
```

#### Delete Schedule
```php

    $response = $schedule->delete($scheduleId, $altId, $altType, [
        //parameters
    ]);
```

#### Schedule an invoice
```php

    $response = $schedule->invoice($scheduleId, $altId, $altType, [
        //parameters
    ]);
```

#### Schedule an invoice
```php

    $response = $schedule->invoice($scheduleId, $altId, $altType, [
        //parameters
    ]);
```

#### Manage Auto payment for an schedule invoice
```php

    $response = $schedule->autoPayment($scheduleId, $altId, $altType, [
        //parameters
    ]);
```

#### Cancel a scheduled invoice
```php

    $response = $schedule->cancel($scheduleId, $altId, $altType, [
        //parameters
    ]);
```

### Text2Pay
```php

    $text2pay = $client->text2pay
    ();
```

#### Create & Send
```php

    $response = $text2pay->create([
        //parameters
    ]);
```

#### Update & Send
```php

    $response = $text2pay->update($id, [
        //parameters
    ]);
```
