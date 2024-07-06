## Companies Api

```php
$client = GoHighLevel::client($access_token,'2021-07-28');
$contactResource = $client->contacts();
```
### Get Contact 
```php

    $contact = $contactResource->get(string $contactId);
```

### Update Contact 
```php

    $contact = $contactResource->update(string $contactId, [
        //body
    ]);
```

### Delete Contact 
```php

    $contact = $contactResource->delete(string $contactId);
```

### Upsert Contact 
```php

    $contact = $contactResource->upsert([
        //body
    ]);
```

### Get Contact By Business Id
```php

    $contact = $contactResource->byBusiness(string $businessId);
```

### Create Contact
```php

    $contact = $contactResource->create([
        //body
    ]);
```

### Get Contacts
```php

    $contacts = $contactResource->list(string $locationId);
```

## Contact Tasks Resource
```php

    $taskResource = $contactResource->tasks();
```

### Get All Contact Tasks
```php

    $tasks = $taskResource->list(string $contactId);
```

### Create Contact Task
```php

    $task = $taskResource->create(string $contactId, [
        //body
    ]);
```

### Get Contact Task
```php

    $task = $taskResource->get(string $contactId, string $taskId);
```

### Update Contact Task
```php

    $task = $taskResource->update(string $contactId, string $taskId, [
        //body
    ]);
```

### Delete Contact Task
```php

    $task = $taskResource->delete(string $contactId, string $taskId);
```

### Update Contact Task As Complete
```php

    $task = $taskResource->completed(string $contactId, string $taskId, bool $completed);
```


## Contact Appointments Resource
```php

    $appointmentResource = $contactResource->appointments();
```


### Get Appointments for Contact
```php

    $contacts = $appointmentResource->contacts(string $contactId);
```

## Contact Tags Resource
```php

    $tagsResource = $contactResource->tags();
```
### Create Contact Tag(s)
```php

    $tag = $tagsResource->create(string $contactId, [
        // tags
    ]);
```

### Remove Contact Tag
```php

    $tag = $tagsResource->remove(string $contactId);
```

## Contact Notes Resource
```php

    $notesResource = $contactResource->notes();
```

### Get Contact Notes
```php

    $notes = $notesResource->list(string $contactId);
```


### Create Contact Note
```php

    $note = $notesResource->create(string $contactId, string $userId, string $body);
```


### Get Contact Note
```php

    $note = $notesResource->get(string $contactId, string $id);
```


### Update Contact Note
```php

    $note = $notesResource->update(string $contactId, string $id, string $userId, string $body);
```


### Delete Contact Note
```php

    $note = $notesResource->delete(string $contactId, string $id);
```

## Contact Campaign Resource
```php

    $campaignResource = $contactResource->campaign();
```

### Add Contact To Campaign
```php
    $campaign = $campaignResource->create(string $contactId, string $campaignId);
```
Or
```php
    $campaign = $campaignResource->add(string $contactId, string $campaignId);
```

### Remove Contact From Campaign
```php
    $campaign = $campaignResource->removeContact(string $contactId, string $campaignId);
```

### Remove Contact From Every Campaign
```php
    $campaign = $campaignResource->removeContactFromAll(string $contactId);
```


## Contact Workflow Resource
```php

    $workflowResource = $contactResource->workflow();
```

### Add Contact To Workflow

```php

    $workflow =  $workflowResource->create(string $contactId, string $workflowId, string $eventStartTime);

```

Or

```php

    $workflow =  $workflowResource->add(string $contactId, string $workflowId, string $eventStartTime);

```

### Remove Contact From Workflow

```php

    $workflow =  $workflowResource->delete(string $contactId, string $workflowId);

```

## Contact Bulk Resource
### Add/Remove Contacts From Business
```php

    $resource = $contactResource->bulk(string $locationId, array $ids, string $businessId);
```

## Search Contact Resource
```php

    $searchResource = $contactResource->search();
```

### Get Duplicate Contact

```php

    $result = $searchResource->getDuplicate(string $locationId, [
        //query parameters
    ]);
```

## Contact Followers Resource
```php

    $followerResource = $contactResource->followers();
```

### Add Contact Follower 

```php

   $follower = $followerResource->add(string $contactId, [
        "sx6wyHhbFdRXh302Lunr","sx6wyHhbFdRXh302Lunr"
   ]);
```


