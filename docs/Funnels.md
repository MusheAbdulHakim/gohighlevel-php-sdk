## Working with Funnels

```php
$version = '2021-07-28';
$ghl = \MusheAbdulHakim\GoHighLevel\GoHighLevel::init($access_token);
$funnels = $ghl->withVersion($version)
                ->make()
                ->funnels()
                ->list($locationId);

```
