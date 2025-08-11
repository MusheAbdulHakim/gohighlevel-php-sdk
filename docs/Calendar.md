## Calendars Resource


### `Calendar`

The `Calendar` class provides methods to manage calendars, their availability slots, and to access related calendar groups, events, and resources. It interacts with several GoHighLevel API endpoints to handle calendar-specific functionality.

-----

#### `slots(string $calendarId, string $startDate, string $endDate, array $params = []): array|string`

This method retrieves the available free time slots for a specific calendar within a given date range.

  * **GoHighLevel API Endpoint:** `GET /calendars/{calendarId}/free-slots`

  * **Parameters:**

      * `$calendarId` (`string`): The ID of the calendar.
      * `$startDate` (`string`): The start date of the range (in `YYYY-MM-DD` format).
      * `$endDate` (`string`): The end date of the range (in `YYYY-MM-DD` format).
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY','2021-04-15');
    $calendarId = 'your_calendar_id';
    $startDate = '2025-08-01';
    $endDate = '2025-08-31';

    try {
        $freeSlots = $client->calendars()->slots($calendarId, $startDate, $endDate);
        print_r($freeSlots);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $calendarId, array $params = []): array|string`

Updates the properties of an existing calendar.

  * **GoHighLevel API Endpoint:** `PUT /calendars/{calendarId}`

  * **Parameters:**

      * `$calendarId` (`string`): The ID of the calendar to update.
      * `$params` (`array`): An associative array of calendar properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY', '2021-04-15');
    $calendarId = 'your_calendar_id';
    $updateParams = [
        'name' => 'Updated Calendar Name',
        'is2WaySync' => true,
    ];

    try {
        $updatedCalendar = $client->calendars()->update($calendarId, $updateParams);
        print_r($updatedCalendar);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $calendarId): array|string`

Retrieves a specific calendar by its ID.

  * **GoHighLevel API Endpoint:** `GET /calendars/{calendarId}`

  * **Parameters:**

      * `$calendarId` (`string`): The ID of the calendar to retrieve.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY','2021-04-15');
    $calendarId = 'your_calendar_id';

    try {
        $calendar = $client->calendars()->get($calendarId);
        print_r($calendar);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $calendarId): array|string`

Deletes a calendar.

  * **GoHighLevel API Endpoint:** `DELETE /calendars/{calendarId}`

  * **Parameters:**

      * `$calendarId` (`string`): The ID of the calendar to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY','2021-04-15');
    $calendarId = 'calendar_to_delete_id';

    try {
        $response = $client->calendars()->delete($calendarId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $locationId, array $params = []): array|string`

Retrieves a list of all calendars in a given location.

  * **GoHighLevel API Endpoint:** `GET /calendars/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY','2021-04-15');
    $locationId = 'your_location_id';

    try {
        $calendars = $client->calendars()->list($locationId);
        print_r($calendars);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $locationId, string $name, array $params = []): array|string`

Creates a new calendar within a specified location.

  * **GoHighLevel API Endpoint:** `POST /calendars/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location where the calendar will be created.
      * `$name` (`string`): The name of the new calendar.
      * `$params` (`array`): An associative array of additional calendar properties.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY','2021-04-15');
    $locationId = 'your_location_id';
    $calendarName = 'My New Team Calendar';
    $calendarParams = [
        'group_id' => 'your_group_id',
        'is2WaySync' => false,
    ];

    try {
        $newCalendar = $client->calendars()->create($locationId, $calendarName, $calendarParams);
        print_r($newCalendar);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `groups(): GroupContract`

This method returns an instance of the `Group` resource, which provides access to methods for managing calendar groups.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('YOUR_API_KEY','2021-04-15');

    // Access the groups resource to list all calendar groups
    $groups = $client->calendars()->groups()->get('your_location_id');

    print_r($groups);
    ```

-----

#### `events(): EventContract`

This method returns an instance of the `Event` resource, which provides access to methods for managing calendar events and appointments.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    // Access the events resource to get an appointment
    $appointment = $client->calendars()->events()->getAppointment('your_appointment_id');

    print_r($appointment);
    ```

-----

#### `resources(): CalendarResourceContract`

This method returns an instance of the `CalendarResource` resource, which provides access to methods for managing calendar resources (e.g., users, rooms).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    // Access the resources resource to list all users
    $users = $client->calendars()->resources()->list('users');

    print_r($users);
    ```

-----

### `CalendarResource`

The `CalendarResource` class provides methods to manage resources associated with calendars, such as users or equipment. The `resourceType` parameter is used to specify the type of resource being managed.

-----

#### `get(string $id, string $resourceType): array|string`

Retrieves a specific calendar resource by its ID and type.

  * **GoHighLevel API Endpoint:** `GET /calendars/resources/{resourceType}/{id}`

  * **Parameters:**

      * `$id` (`string`): The ID of the resource.
      * `$resourceType` (`string`): The type of resource (e.g., `'users'`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $resourceId = 'user_id_here';
    $resourceType = 'users';

    try {
        $resource = $client->calendars()->resources()->get($resourceId, $resourceType);
        print_r($resource);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $id, string $resourceType, array $params = []): array|string`

Updates a specific calendar resource.

  * **GoHighLevel API Endpoint:** `PUT /calendars/resources/{resourceType}/{id}`

  * **Parameters:**

      * `$id` (`string`): The ID of the resource to update.
      * `$resourceType` (`string`): The type of resource.
      * `$params` (`array`): An associative array of resource properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $resourceId = 'user_id_here';
    $resourceType = 'users';
    $updateParams = ['name' => 'Updated User Name'];

    try {
        $updatedResource = $client->calendars()->resources()->update($resourceId, $resourceType, $updateParams);
        print_r($updatedResource);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $id, string $resourceType): array|string`

Deletes a specific calendar resource.

  * **GoHighLevel API Endpoint:** `DELETE /calendars/resources/{resourceType}/{id}`

  * **Parameters:**

      * `$id` (`string`): The ID of the resource to delete.
      * `$resourceType` (`string`): The type of resource.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $resourceId = 'user_id_to_delete';
    $resourceType = 'users';

    try {
        $response = $client->calendars()->resources()->delete($resourceId, $resourceType);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $resourceType, $params = []): array|string`

Retrieves a list of all resources of a specific type.

  * **GoHighLevel API Endpoint:** `GET /calendars/resources/{resourceType}`

  * **Parameters:**

      * `$resourceType` (`string`): The type of resource (e.g., `'users'`).
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $resourceType = 'users';

    try {
        $resources = $client->calendars()->resources()->list($resourceType);
        print_r($resources);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $resourceType, $params = []): array|string`

Creates a new calendar resource of a specific type.

  * **GoHighLevel API Endpoint:** `POST /calendars/resources/{resourceType}`

  * **Parameters:**

      * `$resourceType` (`string`): The type of resource.
      * `$params` (`array`): An associative array of resource properties.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $resourceType = 'users';
    $createParams = [
        'name' => 'New User Resource',
        'email' => 'new.user@example.com'
    ];

    try {
        $newResource = $client->calendars()->resources()->create($resourceType, $createParams);
        print_r($newResource);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Event`

The `Event` class provides methods to manage calendar events, appointments, and blocked slots.

-----

#### `list(string $locationId, array $params = []): array|string`

Retrieves a list of events in a specified location.

  * **GoHighLevel API Endpoint:** `GET /calendars/events/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $locationId = 'your_location_id';

    try {
        $events = $client->calendars()->events()->list($locationId);
        print_r($events);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $locationId, string $startTime, string $endTime, array $params = []): array|string`

Retrieves a list of events in a specified location within a given time range.

  * **GoHighLevel API Endpoint:** `GET /calendars/events/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$startTime` (`string`): The start time of the range (ISO 8601 format).
      * `$endTime` (`string`): The end time of the range (ISO 8601 format).
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $locationId = 'your_location_id';
    $startTime = '2025-08-01T08:00:00Z';
    $endTime = '2025-08-01T17:00:00Z';

    try {
        $events = $client->calendars()->events()->get($locationId, $startTime, $endTime);
        print_r($events);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `slots(string $locationId, string $endTime, string $startTime, array $params = []): array|string`

Retrieves a list of blocked slots within a specific time range for a location.

  * **GoHighLevel API Endpoint:** `GET /calendars/blocked-slots/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$startTime` (`string`): The start time of the range (ISO 8601 format).
      * `$endTime` (`string`): The end time of the range (ISO 8601 format).
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');
    $locationId = 'your_location_id';
    $startTime = '2025-08-01T08:00:00Z';
    $endTime = '2025-08-01T17:00:00Z';

    try {
        $blockedSlots = $client->calendars()->events()->slots($locationId, $endTime, $startTime);
        print_r($blockedSlots);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `getAppointment(string $eventId): array|string`

Retrieves a specific appointment event by its ID.

  * **GoHighLevel API Endpoint:** `GET /calendars/events/appointments/{eventId}`

  * **Parameters:**

      * `$eventId` (`string`): The ID of the appointment event.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $eventId = 'your_appointment_id';

    try {
        $appointment = $client->calendars()->events()->getAppointment($eventId);
        print_r($appointment);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `editAppointment(string $eventId, array $params = []): array|string`

Updates an existing appointment event.

  * **GoHighLevel API Endpoint:** `PUT /calendars/events/appointments/{eventId}`

  * **Parameters:**

      * `$eventId` (`string`): The ID of the appointment to edit.
      * `$params` (`array`): An associative array of appointment properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $eventId = 'your_appointment_id';
    $updateParams = [
        'title' => 'Updated Appointment Title',
    ];

    try {
        $updatedAppointment = $client->calendars()->events()->editAppointment($eventId, $updateParams);
        print_r($updatedAppointment);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `createAppointment(string $calendarId, string $locationId, string $contactId, string $startTime, array $params): array|string`

Creates a new appointment.

  * **GoHighLevel API Endpoint:** `POST /calendars/events/appointments/`

  * **Parameters:**

      * `$calendarId` (`string`): The ID of the calendar.
      * `$locationId` (`string`): The ID of the location.
      * `$contactId` (`string`): The ID of the contact.
      * `$startTime` (`string`): The start time of the appointment (ISO 8601 format).
      * `$params` (`array`): An associative array of additional appointment properties.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $appointmentParams = [
        'calendarId' => 'your_calendar_id',
        'locationId' => 'your_location_id',
        'contactId' => 'your_contact_id',
        'startTime' => '2025-08-01T10:00:00Z',
        'appointmentStatus' => 'confirmed',
    ];

    try {
        $newAppointment = $client->calendars()->events()->createAppointment(
            $appointmentParams['calendarId'],
            $appointmentParams['locationId'],
            $appointmentParams['contactId'],
            $appointmentParams['startTime'],
            $appointmentParams
        );
        print_r($newAppointment);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `createSlot(string $locationId, string $startTime, string $endTime, array $params = []): array|string`

Creates a new blocked slot on a calendar.

  * **GoHighLevel API Endpoint:** `POST /calendars/events/block-slots`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$startTime` (`string`): The start time of the blocked slot (ISO 8601 format).
      * `$endTime` (`string`): The end time of the blocked slot (ISO 8601 format).
      * `$params` (`array`): An associative array of additional properties for the slot.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $locationId = 'your_location_id';
    $startTime = '2025-08-01T12:00:00Z';
    $endTime = '2025-08-01T13:00:00Z';

    try {
        $newBlockedSlot = $client->calendars()->events()->createSlot($locationId, $startTime, $endTime);
        print_r($newBlockedSlot);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `editSlot(string $eventId, array $params = []): array|string`

Updates an existing blocked slot.

  * **GoHighLevel API Endpoint:** `PUT /calendars/events/block-slots/{eventId}`

  * **Parameters:**

      * `$eventId` (`string`): The ID of the blocked slot to update.
      * `$params` (`array`): An associative array of slot properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $eventId = 'your_blocked_slot_id';
    $updateParams = [
        'endTime' => '2025-08-01T14:00:00Z',
    ];

    try {
        $updatedSlot = $client->calendars()->events()->editSlot($eventId, $updateParams);
        print_r($updatedSlot);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $eventId): array|string`

Deletes a calendar event or blocked slot.

  * **GoHighLevel API Endpoint:** `DELETE /calendars/events/{eventId}`

  * **Parameters:**

      * `$eventId` (`string`): The ID of the event or blocked slot to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $eventId = 'your_event_id_to_delete';

    try {
        $response = $client->calendars()->events()->delete($eventId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Group`

The `Group` class provides methods to manage calendar groups, which are collections of calendars.

-----

#### `get(string $locationId): array|string`

Retrieves a list of all calendar groups in a location.

  * **GoHighLevel API Endpoint:** `GET /calendars/groups`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $locationId = 'your_location_id';

    try {
        $groups = $client->calendars()->groups()->get($locationId);
        print_r($groups);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(array $params): array|string`

Creates a new calendar group.

  * **GoHighLevel API Endpoint:** `POST /calendars/groups`

  * **Parameters:**

      * `$params` (`array`): An associative array of calendar group properties.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $createParams = [
        'name' => 'New Group Name',
        'locationId' => 'your_location_id',
    ];

    try {
        $newGroup = $client->calendars()->groups()->create($createParams);
        print_r($newGroup);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `validate(string $locationId, string $slug, bool $available): array|string`

Validates if a calendar group slug is available.

  * **GoHighLevel API Endpoint:** `PUT /calendars/groups/validate-slug`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$slug` (`string`): The calendar group slug to validate.
      * `$available` (`bool`): Whether the slug is available or not.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $locationId = 'your_location_id';
    $slug = 'my-new-group-slug';

    try {
        $validationResult = $client->calendars()->groups()->validate($locationId, $slug, true);
        print_r($validationResult);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $groupId): array|string`

Deletes a calendar group.

  * **GoHighLevel API Endpoint:** `DELETE /calendars/groups/{groupId}`

  * **Parameters:**

      * `$groupId` (`string`): The ID of the calendar group to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $groupId = 'your_group_id_to_delete';

    try {
        $response = $client->calendars()->groups()->delete($groupId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $groupId, array $params = []): array|string`

Updates an existing calendar group.

  * **GoHighLevel API Endpoint:** `PUT /calendars/groups/{groupId}`

  * **Parameters:**

      * `$groupId` (`string`): The ID of the group to update.
      * `$params` (`array`): An associative array of group properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $groupId = 'your_group_id';
    $updateParams = [
        'name' => 'Updated Group Name',
    ];

    try {
        $updatedGroup = $client->calendars()->groups()->update($groupId, $updateParams);
        print_r($updatedGroup);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `disable(string $groupId, bool $isActive): array|string`

Disables or enables a calendar group.

  * **GoHighLevel API Endpoint:** `PUT /calendars/groups/{groupId}/status`

  * **Parameters:**

      * `$groupId` (`string`): The ID of the group to update.
      * `$isActive` (`bool`): `true` to enable the group, `false` to disable it.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $groupId = 'your_group_id';

    // Disable the group
    try {
        $response = $client->calendars()->groups()->disable($groupId, false);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```