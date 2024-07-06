<div align="center">
<img src="art/sdk-art.jpg" height="100" alt="GoHighLevel PHP">
    <p align="center">
        <a href="https://github.com/MusheAbdulHakim/gohighlevel-php-sdk/actions"><img alt="GitHub Workflow Status (master)" src="https://github.com/MusheAbdulHakim/gohighlevel-php-sdk/actions/workflows/tests.yml/badge.svg"></a>
        <a href="https://packagist.org/packages/musheabdulhakim/gohighlevel-php"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/musheabdulhakim/gohighlevel-php"></a>
        <a href="https://packagist.org/packages/musheabdulhakim/gohighlevel-php"><img alt="Latest Version" src="https://img.shields.io/packagist/v/musheabdulhakim/gohighlevel-php"></a>
        <a href="https://packagist.org/packages/musheabdulhakim/gohighlevel-php"><img alt="License" src="https://img.shields.io/packagist/l/musheabdulhakim/gohighlevel-php"></a>
    </p>
</div>

------
This package provides a wonderful **PHP API** client that allows you to interact
with [GoHighLevel Api](https://highlevel.stoplight.io/docs/integrations/0443d7d1a4bd0-overview/)


> **Requires [Composer](https://getcomposer.org/)**
> **Requires [PHP 8.2+](https://php.net/releases/)**

First, install via [Composer](https://getcomposer.org/)

```bash
composer require musheabdulhakim/gohighlevel-php
```

🧹 Keep a modern codebase with **Pint**:

```bash
composer lint
```

✅ Run unit tests using **PEST**

```bash
composer test:unit
```

🚀 Run the entire test suite:

```bash
composer test
```

## Usage

```php
use \MusheAbdulHakim\GoHighLevel\GoHighLevel;

//Initialize the client
$client = GoHighLevel::client($access_token, '2021-07-28');

//Or 
$clientInit = GoHighLevel::init($access_token)->withVersion('2021-07-28');


// Get User by Location
$user = $client->User()->byLocation($locationId)


//Get locations by stripeId with companyId

$data = $clientInit
    ->withHttpHeader('channel','OAUTH')
    ->withHttpHeader('source','INTEGRATION')
    ->make()->Saas()->get([
        'companyId' => '',
        'subscriptionId' => '',
        'customerId' => ''
    ]);


```

### [Visit The Documentation](https://musheabdulhakim.github.io/gohighlevel-php-sdk)
