## [Users Api](https://highlevel.stoplight.io/docs/integrations/7f581f780cf2f-users-api)


### Create User
```php
use \MusheAbdulHakim\GoHighLevel\GoHighLevel;


$client = GoHighLevel::client($access_token,'2021-07-28');


$user = $client->user()->create($companyId,[
                'firstName' => $names[0] ?? '',
                'lastName' => $names[1] ?? '',
                'email' => $userEmail,
                'password' => $userPassword,
                'type' => 'account',
                'role' => 'admin',
                'locationIds' => [$locationId],
                'permissions' => json_encode([
                    "campaignsEnabled" => true,
                    "campaignsReadOnly" => true,
                    "contactsEnabled" => true,
                    "workflowsEnabled" => true,
                    "workflowsReadOnly" => true,
                    "triggersEnabled" => true,
                    "funnelsEnabled" => true,
                    "websitesEnabled" => true,
                    "opportunitiesEnabled" => true,
                    "dashboardStatsEnabled" => true,
                    "bulkRequestsEnabled" => true,
                    "appointmentsEnabled" => true,
                    "reviewsEnabled" => true,
                    "onlineListingsEnabled" => true,
                    "phoneCallEnabled" => true,
                    "conversationsEnabled" => true,
                    "assignedDataOnly" => true,
                    "adwordsReportingEnabled" => true,
                    "membershipEnabled" => true,
                    "facebookAdsReportingEnabled" => true,
                    "attributionsReportingEnabled" => true,
                    "settingsEnabled" => true,
                    "tagsEnabled" => true,
                    "leadValueEnabled" => true,
                    "marketingEnabled" => true,
                    "agentReportingEnabled" => true,
                    "botService" => true,
                    "socialPlanner" => true,
                    "bloggingEnabled" => true,
                    "invoiceEnabled" => true,
                    "affiliateManagerEnabled" => true,
                    "contentAiEnabled" => true,
                    "refundsEnabled" => true,
                    "recordPaymentEnabled" => true,
                    "cancelSubscriptionEnabled" => true,
                    "paymentsEnabled" => true,
                    "communitiesEnabled" => true,
                    "exportPaymentsEnabled" => true
                ]),
            ]);


``` 

### [Update User](https://highlevel.stoplight.io/docs/integrations/52e75431abf04-update-user)

```php
use \MusheAbdulHakim\GoHighLevel\GoHighLevel;


$client = GoHighLevel::client($access_token,'2021-07-28');
$client->user()->update($userId, [

]);

```

### [Delete User](https://highlevel.stoplight.io/docs/integrations/c0ec81b013379-delete-user) 

```php
use \MusheAbdulHakim\GoHighLevel\GoHighLevel;


$client = GoHighLevel::client($access_token,'2021-07-28');
$client->user()->delete($userId);

```

### [Get User By Location](https://highlevel.stoplight.io/docs/integrations/2b1f72be935aa-get-user-by-location)

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$client->user()->byLocation($locationId)

```

### Get user

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$client->user()->get($userId)

```
