## Calendars Api

```php
$client = GoHighLevel::client($access_token,'2021-04-15');
```

### Get Calendars

```php
$client->calendars()->list($locationId, []);
```

### Get Calendars Slots

```php
$client->calendars()->slots($calendarId, $startDate, $endDate);
```
### Update Calendar By Id

```php
$client->calendars()->update($calendarId, [
    //
]);
```
### Get Calendar By Id

```php
$client->calendars()->get($calendarId);
```

### Delete Calendar By Id

```php
$client->calendars()->delete($calendarId);
```


### Create Calendar

```php
    $client->calendars()->create($locationId, $name, [
        //
    ]);
   
```

## Calendar Groups

```php
    $groups = $client->calendars()->groups();
   
```

### Get Calendar Groups
```php
    $group = $groups->get(string $locationId);
```
### Create Calendar Group
```php
    $group = $groups->create([
        //
    ]);
```
### Validate Calendar Group
```php
    $validate = $groups->validate(string $locationId, string $slug, bool $available);
```
### Delete Calendar Group
```php
    $delete = $groups->delete(string $groupId);
```
### Update Calendar Group
```php
    $delete = $groups->update(string $groupId, [
        //
    ]);
```

### Disable Calendar Group
```php
    $delete = $groups->disable(string $groupId, bool $isActive)
```


## Calendar Events

### Calendar Event Resource

```php
$eventResource = $client->calendars()->events();
```

### Get Calendars Events
```php
$events = $eventResource->list(string $locationId, array []);

```
### Get Calendars Events
```php
$event = $eventResource->get(string $locationId, string $startTime, string $endTime, [
    //
]);

```
### Calendars Events Slots
```php
$slots = $eventResource->slots(string $locationId, string $endTime, string $startTime, [
    //params
]);

```

### Edit Calendars Events Appointment
```php
$appointment = $eventResource->editAppointment(string $eventId, [
    //params
]);

```

### Create Calendars Events Appointment
```php
$appointment = $eventResource->createAppointment(string $calendarId, string $locationId, string $contactId, string $startTime, [
    // params
]);

```

### Create Calendars Events Slot
```php
$event = $eventResource->createSlot(string $locationId, string $startTime, string $endTime, [
    //params
]);

```

### Edit Calendars Events Slot
```php
$slot = $eventResource->editSlot(string $eventId, [
    // params
]);

```

### Delete Calendars Events
```php
$event = $eventResource->delete(string $eventId);

```


## Calendar Resource

### Calendar Resource

```php
$calendarResource = $client->calendars()->resources();
```

### Get Calendar Resource

```php
$resource = $calendarResource->get(string $id, string $resourceType);
```

### Update Calendar Resource

```php
$resource = $calendarResource->update(string $id, string $resourceType, [
    // params
]);
```

### Delete Calendar Resource

```php
$resource = $calendarResource->delete(string $id, string $resourceType);
```


### List calendar resources

```php
$resource = $calendarResource->list(string $resourceType, [
    //
]);
```

### Create Calendar Resource

```php
$resource = $calendarResource->create(string $resourceType, [
    //params
]);
```


