## Contact Resource

### `Contact`

The `Contact` class is the central resource for managing contacts within GoHighLevel. It offers a wide range of methods to perform CRUD operations on contacts and provides access to related sub-resources like appointments, tags, notes, and workflows.

-----

#### `get(string $contactId): string|array`

Retrieves a single contact by their ID. This method corresponds to the GoHighLevel API's `GET /contacts/{contactId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The unique identifier of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    try {
        $contact = $client->contacts()->get('contact_123');
        print_r($contact);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $contactId, array $params): string|array`

Updates an existing contact's details. This method corresponds to the `PUT /contacts/{contactId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The unique identifier of the contact to update.
      * `$params` (`array`): An associative array of the contact properties you want to modify.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    $updateParams = [
        'firstName' => 'John',
        'lastName' => 'Doe',
        'email' => 'john.doe@example.com',
    ];

    try {
        $updatedContact = $client->contacts()->update('contact_123', $updateParams);
        print_r($updatedContact);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $contactId): array|string`

Deletes a contact from the platform. This method corresponds to the `DELETE /contacts/{contactId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The unique identifier of the contact to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    try {
        $response = $client->contacts()->delete('contact_123');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `upsert(array $params): array|string`

Creates a new contact or updates an existing one if a matching contact is found. This method corresponds to the `POST /contacts/upsert` endpoint.

  * **Parameters:**

      * `$params` (`array`): An associative array of contact details. The API will use a unique identifier (like email or phone) to determine if the contact already exists.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    $contactData = [
        'firstName' => 'Jane',
        'lastName' => 'Smith',
        'email' => 'jane.smith@example.com',
        'locationId' => 'loc_abc',
    ];

    try {
        $upsertedContact = $client->contacts()->upsert($contactData);
        print_r($upsertedContact);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `byBusiness(string $businessId): string|array`

Retrieves a list of contacts belonging to a specific business. Note that this method's implementation seems to be using `locationId` as the parameter name, which should be aligned with the GoHighLevel API documentation.

  * **Parameters:**

      * `$businessId` (`string`): The unique identifier of the business.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    try {
        $contactsInBusiness = $client->contacts()->byBusiness('business_456');
        print_r($contactsInBusiness);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(array $params): array|string`

Creates a new contact. This method corresponds to the `POST /contacts/` endpoint.

  * **Parameters:**

      * `$params` (`array`): An associative array of contact details to create.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    $newContactData = [
        'firstName' => 'Peter',
        'lastName' => 'Parker',
        'email' => 'peter.parker@example.com',
        'locationId' => 'loc_abc',
    ];

    try {
        $newContact = $client->contacts()->create($newContactData);
        print_r($newContact);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $locationId): string|array`

Retrieves a list of all contacts within a specific location. This method corresponds to the `GET /contacts/` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The unique identifier of the location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    try {
        $contactsList = $client->contacts()->list('loc_abc');
        print_r($contactsList);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `tasks(): TaskContract`

Returns a resource object for managing contact-specific tasks.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Create a new task for a contact
    $task = $client->contacts()->tasks()->create('contact_123', ['title' => 'Follow up call']);
    print_r($task);
    ```

-----

#### `appointments(): AppointmentContract`

Returns a resource object for managing contact appointments.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Get all appointments for a contact
    $appointments = $client->contacts()->appointments()->contacts('contact_123');
    print_r($appointments);
    ```

-----

#### `tags(): TagContract`

Returns a resource object for managing contact tags.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Add a tag to a contact
    $response = $client->contacts()->tags()->create('contact_123', ['VIP']);
    print_r($response);
    ```

-----

#### `notes(): NoteContract`

Returns a resource object for managing contact notes.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Create a new note for a contact
    $note = $client->contacts()->notes()->create('contact_123', 'user_id_456', 'Initial contact made.');
    print_r($note);
    ```

-----

#### `campaign(): CampaignContract`

Returns a resource object for managing contact campaigns.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Add a contact to a campaign
    $response = $client->contacts()->campaign()->add('contact_123', 'campaign_789');
    print_r($response);
    ```

-----

#### `workflow(): WorkflowContract`

Returns a resource object for managing contact workflows.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Add a contact to a workflow
    $response = $client->contacts()->workflow()->add('contact_123', 'workflow_xyz', '2025-08-11T17:00:00Z');
    print_r($response);
    ```

-----

#### `bulk(string $locationId, array $ids, string $businessId): array|string`

A helper method to bulk-add or remove contacts from a business. This method internally uses the `Bulk` resource.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$ids` (`array`): An array of contact IDs to add or remove.
      * `$businessId` (`string`): The ID of the business to modify.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactIds = ['contact_1', 'contact_2'];

    try {
        $response = $client->contacts()->bulk('loc_abc', $contactIds, 'business_def');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `search(): SearchContract`

Returns a resource object for searching contacts and managing duplicates.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Search for contacts with specific criteria
    $searchResults = $client->contacts()->search()->query(['query' => 'John Doe']);
    print_r($searchResults);
    ```

-----

#### `followers(): FollowerContract`

Returns a resource object for managing contact followers.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // Add followers to a contact
    $response = $client->contacts()->followers()->add('contact_123', ['user_id_1', 'user_id_2']);
    print_r($response);
    ```

-----

### `Appointment`

The `Appointment` class provides methods to retrieve a list of appointments associated with a specific contact. This is a sub-resource of the `Contact` class.

-----

#### `contacts(string $contactId): string|array`

Retrieves a list of all appointments for a given contact. This method corresponds to the `GET /contacts/{contactId}/appointments` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The unique identifier of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    try {
        $appointments = $client->contacts()->appointments()->contacts('contact_123');
        print_r($appointments);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Bulk`

The `Bulk` class contains methods for performing bulk operations on contacts, specifically for adding or removing them from a business. This is a sub-resource of the `Contact` class.

-----

#### `addOrRemove(string $locationId, array $ids, string $businessId): array|string`

Adds a list of contacts to a business or removes them if they are already associated. This method corresponds to the `POST /contacts/bulk/business` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location where the contacts reside.
      * `$ids` (`array`): An array of contact IDs to process.
      * `$businessId` (`string`): The ID of the business to which the contacts will be added or from which they will be removed.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_abc';
    $contactIds = ['contact_1', 'contact_2'];
    $businessId = 'business_def';

    try {
        $response = $client->contacts()->bulk()->addOrRemove($locationId, $contactIds, $businessId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Campaign`

The `Campaign` class provides methods for managing a contact's enrollment in marketing campaigns. This is a sub-resource of the `Contact` class.

-----

#### `create(string $contactId, string $campaignId): string|array`

Adds a contact to a specific campaign. Note: This method is an alias for the `add` method. It corresponds to the `POST /contacts/{contactId}/campaigns` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$campaignId` (`string`): The ID of the campaign to which the contact will be added.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $campaignId = 'campaign_456';

    try {
        $response = $client->contacts()->campaign()->create($contactId, $campaignId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `add(string $contactId, string $campaignId): string|array`

Adds a contact to a specific campaign. This is the primary method for this operation. It corresponds to the `POST /contacts/{contactId}/campaigns` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$campaignId` (`string`): The ID of the campaign to which the contact will be added.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $campaignId = 'campaign_456';

    try {
        $response = $client->contacts()->campaign()->add($contactId, $campaignId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `removeContact(string $contactId, string $campaignId): string|array`

Removes a contact from a specific campaign. This method corresponds to the `DELETE /contacts/{contactId}/campaigns/{campaignId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$campaignId` (`string`): The ID of the campaign from which the contact will be removed.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $campaignId = 'campaign_456';

    try {
        $response = $client->contacts()->campaign()->removeContact($contactId, $campaignId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `removeContactFromAll(string $contactId): string|array`

Removes a contact from all campaigns they are currently enrolled in. This method corresponds to the `DELETE /contacts/{contactId}/campaigns/removeAll` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';

    try {
        $response = $client->contacts()->campaign()->removeContactFromAll($contactId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Follower`

The `Follower` class is a sub-resource of `Contact` that manages the users following a specific contact.

-----

#### `add(string $contactId, array $followers): string|array`

Adds one or more users as followers to a contact. This method corresponds to the `POST /contacts/{contactId}/followers` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$followers` (`array`): An array of user IDs to add as followers.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $followers = ['user_abc', 'user_xyz'];

    try {
        $response = $client->contacts()->followers()->add($contactId, $followers);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $contactId, array $followers): string|array`

This method is an alias for `add`, performing the same action of adding followers to a contact.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$followers` (`array`): An array of user IDs to add as followers.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $followers = ['user_abc', 'user_xyz'];

    try {
        $response = $client->contacts()->followers()->create($contactId, $followers);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $contactId): string|array`

Removes all followers from a contact. This method corresponds to the `DELETE /contacts/{contactId}/followers` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';

    try {
        $response = $client->contacts()->followers()->delete($contactId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Note`

The `Note` class provides methods for managing notes associated with a specific contact. This is a sub-resource of the `Contact` class.

-----

#### `list(string $contactId): string|array`

Retrieves all notes for a given contact. This method corresponds to the `GET /contacts/{contactId}/notes` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';

    try {
        $notes = $client->contacts()->notes()->list($contactId);
        print_r($notes);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $contactId, string $userId, string $body): string|array`

Creates a new note for a contact. This method corresponds to the `POST /contacts/{contactId}/notes` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$userId` (`string`): The ID of the user creating the note.
      * `$body` (`string`): The content of the note.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $userId = 'user_abc';
    $noteBody = 'Contact requested a demo for the new product.';

    try {
        $newNote = $client->contacts()->notes()->create($contactId, $userId, $noteBody);
        print_r($newNote);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $contactId, string $id): string|array`

Retrieves a specific note by its ID for a given contact. This method corresponds to the `GET /contacts/{contactId}/notes/{id}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$id` (`string`): The ID of the note.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $noteId = 'note_456';

    try {
        $note = $client->contacts()->notes()->get($contactId, $noteId);
        print_r($note);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $contactId, string $id, string $userId, string $body): string|array`

Updates an existing note. This method corresponds to the `PUT /contacts/{contactId}/notes/{id}` endpoint. Note: The provided method implementation doesn't include the `$userId` and `$body` in the payload, which is required by the API.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$id` (`string`): The ID of the note to update.
      * `$userId` (`string`): The ID of the user updating the note.
      * `$body` (`string`): The updated content of the note.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $noteId = 'note_456';
    $userId = 'user_abc';
    $updatedBody = 'Updated note content.';

    try {
        // Note: The implementation in the provided code is incomplete.
        // It would ideally be:
        // $response = $client->contacts()->notes()->update($contactId, $noteId, $userId, $updatedBody);
        // ...but the current code would need to be updated to pass the body.
        echo "This example is for a complete implementation. The current SDK method is incomplete.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $contactId, string $id): array|string`

Deletes a specific note. This method corresponds to the `DELETE /contacts/{contactId}/notes/{id}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$id` (`string`): The ID of the note to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $noteId = 'note_456';

    try {
        $response = $client->contacts()->notes()->delete($contactId, $noteId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Search`

The `Search` class, a sub-resource of `Contact`, provides methods for searching for contacts and finding duplicates.

-----

#### `query(array $params): array|string`

Performs a search for contacts based on various criteria. This method corresponds to the `POST /contacts/search/` endpoint.

  * **Parameters:**

      * `$params` (`array`): An associative array of search parameters, which can include fields like `query`, `limit`, `skip`, etc.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $searchParams = [
        'query' => [
            'fullName' => 'John Doe',
        ],
        'limit' => 10,
    ];

    try {
        $searchResults = $client->contacts()->search()->query($searchParams);
        print_r($searchResults);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `getDuplicate(string $locationId, $parameters = []): array|string`

Finds and retrieves duplicate contacts within a specified location. This method corresponds to the `GET /contacts/search/duplicate` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to search in.
      * `$parameters` (`array`): Optional query parameters to refine the search.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_abc';

    try {
        $duplicates = $client->contacts()->search()->getDuplicate($locationId);
        print_r($duplicates);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Tag`

The `Tag` class, a sub-resource of `Contact`, provides methods for managing a contact's tags.

-----

#### `create(string $contactId, array|string $tags): string|array`

Adds one or more tags to a contact. This method corresponds to the `POST /contacts/{contactId}/tags` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$tags` (`array|string`): A string or an array of tags to add.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $tagsToAdd = ['VIP', 'Lead'];

    try {
        $response = $client->contacts()->tags()->create($contactId, $tagsToAdd);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `remove(string $contactId): array|string`

Removes all tags from a contact. This method corresponds to the `DELETE /contacts/{contactId}/tags` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';

    try {
        $response = $client->contacts()->tags()->remove($contactId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $id): array|string`

This method is an alias for `remove`, with the `$id` parameter representing the contact ID.

  * **Parameters:**

      * `$id` (`string`): The ID of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';

    try {
        $response = $client->contacts()->tags()->delete($contactId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Task`

The `Task` class, a sub-resource of `Contact`, provides methods for managing tasks associated with a contact.

-----

#### `list(string $contactId): string|array`

Retrieves a list of all tasks for a given contact. This method corresponds to the `GET /contacts/{contactId}/tasks` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';

    try {
        $tasks = $client->contacts()->tasks()->list($contactId);
        print_r($tasks);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $contactId, array $params): string|array`

Creates a new task for a contact. This method corresponds to the `POST /contacts/{contactId}/tasks` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$params` (`array`): An associative array of task details (e.g., `title`, `dueDate`, `assignedTo`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $taskParams = [
        'title' => 'Follow-up call with client',
        'dueDate' => '2025-08-15T10:00:00Z',
    ];

    try {
        $newTask = $client->contacts()->tasks()->create($contactId, $taskParams);
        print_r($newTask);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $contactId, string $taskId): string|array`

Retrieves a specific task for a contact by its ID. This method corresponds to the `GET /contacts/{contactId}/tasks/{taskId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$taskId` (`string`): The ID of the task.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $taskId = 'task_456';

    try {
        $task = $client->contacts()->tasks()->get($contactId, $taskId);
        print_r($task);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $contactId, string $taskId, array $params): string|array`

Updates an existing task for a contact. This method corresponds to the `PUT /contacts/{contactId}/tasks/{taskId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$taskId` (`string`): The ID of the task to update.
      * `$params` (`array`): An associative array of task properties to modify.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $taskId = 'task_456';
    $updateParams = [
        'title' => 'Updated follow-up call',
    ];

    try {
        $updatedTask = $client->contacts()->tasks()->update($contactId, $taskId, $updateParams);
        print_r($updatedTask);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $contactId, string $taskId): string|array`

Deletes a task for a contact. This method corresponds to the `DELETE /contacts/{contactId}/tasks/{taskId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$taskId` (`string`): The ID of the task to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $taskId = 'task_456';

    try {
        $response = $client->contacts()->tasks()->delete($contactId, $taskId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `completed(string $contactId, string $taskId, bool $completed): string|array`

Marks a task as completed or uncompleted. This method corresponds to the `PUT /contacts/{contactId}/tasks/{taskId}/completed` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$taskId` (`string`): The ID of the task.
      * `$completed` (`bool`): `true` to mark as completed, `false` to mark as uncompleted.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $taskId = 'task_456';

    // Mark task as completed
    try {
        $response = $client->contacts()->tasks()->completed($contactId, $taskId, true);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Workflow`

The `Workflow` class, a sub-resource of `Contact`, provides methods for managing a contact's enrollment in workflows.

-----

#### `create(string $contactId, string $workflowId, string $eventStartTime): string|array`

Adds a contact to a specific workflow. This method is an alias for `add`. It corresponds to the `POST /contacts/{contactId}/workflow/{workflowId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$workflowId` (`string`): The ID of the workflow.
      * `$eventStartTime` (`string`): The start time for the workflow enrollment (ISO 8601 format).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $workflowId = 'workflow_abc';
    $eventStartTime = '2025-08-11T17:00:00Z';

    try {
        $response = $client->contacts()->workflow()->create($contactId, $workflowId, $eventStartTime);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `add(string $contactId, string $workflowId, string $eventStartTime): string|array`

Adds a contact to a specific workflow. This is the primary method for this operation. It corresponds to the `POST /contacts/{contactId}/workflow/{workflowId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$workflowId` (`string`): The ID of the workflow.
      * `$eventStartTime` (`string`): The start time for the workflow enrollment (ISO 8601 format).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $workflowId = 'workflow_abc';
    $eventStartTime = '2025-08-11T17:00:00Z';

    try {
        $response = $client->contacts()->workflow()->add($contactId, $workflowId, $eventStartTime);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $contactId, string $workflowId): string|array`

Removes a contact from a specific workflow. This method corresponds to the `DELETE /contacts/{contactId}/workflow/{workflowId}` endpoint.

  * **Parameters:**

      * `$contactId` (`string`): The ID of the contact.
      * `$workflowId` (`string`): The ID of the workflow to remove the contact from.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $contactId = 'contact_123';
    $workflowId = 'workflow_abc';

    try {
        $response = $client->contacts()->workflow()->delete($contactId, $workflowId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```