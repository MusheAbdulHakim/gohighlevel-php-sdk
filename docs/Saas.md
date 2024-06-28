## [Saas Api](https://highlevel.stoplight.io/docs/integrations/5e0404456de81-saa-s-api)

### Get locations by stripeId with companyId

```php
    GoHighLevel::init($access_token)->withVersion('2021-04-15')
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->get([
        'companyId' => '',
        'subscriptionId' => '',
        'customerId' => ''
    ]);

```
### Update Saas

```php
    GoHighLevel::init($access_token)->withVersion('2021-04-15')
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->update($locationid,[
        'companyId' => '',
        'subscriptionId' => '',
        'customerId' => ''
    ]);

```
### Enable Saas For Location
```php
$client = GoHighLevel::init($access_token)
    ->withVersion('2021-07-28')
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->enable($locationId,[
        //body
    ]);
```
### Disable Saas For Locations
```php
$client = GoHighLevel::init($access_token)
    ->withVersion('2021-07-28')
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->disable($locationId, [
        'locationIds' => ''
    ]);
```
### Pause Saas For Location
```php
$client = GoHighLevel::init($access_token)
    ->withVersion('2021-04-15')
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->pause($locationId, [
        'paused' => true
        'companyId' => ''
    ]);
```
### Update Rebilling
```php
$client = GoHighLevel::init($access_token)
    ->withVersion('2021-04-15')
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->updateRebilling($companyId, [
        'product' => true
        'locationIds' => ''
        'config' => ''
    ]);
```
