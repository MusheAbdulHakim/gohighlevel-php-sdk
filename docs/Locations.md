## [Sub-Account (Formerly Location) Resource](https://highlevel.stoplight.io/docs/integrations/e283eac258a96-location-api)
### `Location`

The `Location (Formerly Location)` class is the main resource for managing GoHighLevel locations. It handles all basic **CRUD (Create, Read, Update, Delete)** operations for a location and provides access to sub-resources for managing custom fields, custom values, tags, templates, and more.

-----

#### `create(array $params): array|string`

Creates a new location.

  * **API Endpoint:** `POST /locations/`

  * **Parameters:**

      * `$params` (`array`): An associative array of location data, including the name, address, and contact information.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $newLocationData = [
        'name' => 'My New Location',
        'address' => '123 Main St',
        'city' => 'Anytown',
        'state' => 'CA',
        'postalCode' => '12345',
        'website' => 'https://mynewlocation.com',
    ];

    try {
        $newLocation = $client->location()->create($newLocationData);
        print_r($newLocation);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $locationId): array|string`

Retrieves a single location by its ID.

  * **API Endpoint:** `GET /locations/{locationId}`

  * **Parameters:**

      * `$locationId` (`string`): The unique identifier of the location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';

    try {
        $locationDetails = $client->location()->get($locationId);
        print_r($locationDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $locationId, array $params = []): array|string`

Updates an existing location.

  * **API Endpoint:** `PUT /locations/{locationId}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to update.
      * `$params` (`array`): An associative array of the properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $updateData = ['name' => 'Updated Location Name', 'website' => 'https://newsite.com'];

    try {
        $updatedLocation = $client->location()->update($locationId, $updateData);
        print_r($updatedLocation);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $locationId, array $params = []): array|string`

Deletes a location.

  * **API Endpoint:** `DELETE /locations/{locationId}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to delete.
      * `$params` (`array`): Optional parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';

    try {
        $response = $client->location()->delete($locationId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `tag(): TagContract`

Returns an instance of the `Tag` sub-resource for managing tags within a location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $tagResource = $client->location()->tag();

    try {
        $tags = $tagResource->list($locationId);
        print_r($tags);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `customField(): CustomFieldContract`

Returns an instance of the `CustomField` sub-resource for managing custom fields within a location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customFieldResource = $client->location()->customField();

    try {
        $customFields = $customFieldResource->list($locationId);
        print_r($customFields);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `customValue(): CustomValueContract`

Returns an instance of the `CustomValue` sub-resource for managing custom values within a location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customValueResource = $client->location()->customValue();

    try {
        $customValues = $customValueResource->list($locationId);
        print_r($customValues);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `template(): TemplateContract`

Returns an instance of the `Template` sub-resource for managing templates within a location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $templateResource = $client->location()->template();

    try {
        $templates = $templateResource->list($locationId, 'origin_456');
        print_r($templates);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `search(): SearchContract`

Returns an instance of the `Search` sub-resource for searching locations and tasks.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $searchResource = $client->location()->search();

    try {
        $results = $searchResource->search(['query' => 'My New Location']);
        print_r($results);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `timezone(): TimezoneContract`

Returns an instance of the `Timezone` sub-resource for listing timezones.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $timezoneResource = $client->location()->timezone();

    try {
        $timezones = $timezoneResource->list($locationId);
        print_r($timezones);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `CustomField`

The `CustomField` class is a sub-resource of `Location` that manages custom fields. It allows you to create, retrieve, update, and delete custom fields, as well as upload files to file-type fields.

-----

#### `list(string $locationId, array $params = []): array|string`

Retrieves all custom fields for a specific location.

  * **API Endpoint:** `GET /locations/{locationId}/customFields`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';

    try {
        $customFields = $client->location()->customField()->list($locationId);
        print_r($customFields);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $locationId, string $name, string $dataType, array $params): array|string`

Creates a new custom field.

  * **API Endpoint:** `POST /locations/{locationId}/customFields`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$name` (`string`): The name of the custom field.
      * `$dataType` (`string`): The data type of the field (e.g., `'text'`, `'number'`, `'date'`).
      * `$params` (`array`): An associative array of additional field properties.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $fieldParams = ['group' => 'contact', 'placeholder' => 'Enter your favorite color'];

    try {
        $newField = $client->location()->customField()->create($locationId, 'Favorite Color', 'text', $fieldParams);
        print_r($newField);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $locationId, string $id): array|string`

Retrieves a single custom field by its ID.

  * **API Endpoint:** `GET /locations/{locationId}/customFields/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the custom field.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customFieldId = 'cf_456';

    try {
        $fieldDetails = $client->location()->customField()->get($locationId, $customFieldId);
        print_r($fieldDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $locationId, string $id, array $params): array|string`

Updates an existing custom field.

  * **API Endpoint:** `PUT /locations/{locationId}/customFields/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the custom field.
      * `$params` (`array`): An associative array of the properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customFieldId = 'cf_456';
    $updateData = ['placeholder' => 'Enter your new favorite color'];

    try {
        $updatedField = $client->location()->customField()->update($locationId, $customFieldId, $updateData);
        print_r($updatedField);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $locationId, string $id): array|string`

Deletes a custom field.

  * **API Endpoint:** `DELETE /locations/{locationId}/customFields/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the custom field to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customFieldId = 'cf_456';

    try {
        $response = $client->location()->customField()->delete($locationId, $customFieldId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `upload(string $locationId, array $params): array|string`

Uploads a file to a custom field. The `params` array should contain the file data for a multipart request.

  * **API Endpoint:** `POST /locations/{locationId}/customFields/upload`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): An array containing the file and other data for a multipart request.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $filePath = '/path/to/your/file.pdf';
    $uploadParams = [
        'multipart' => [
            [
                'name' => 'file',
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath),
            ],
            [
                'name' => 'customFieldId',
                'contents' => 'cf_upload_123',
            ],
        ],
    ];

    try {
        $uploadResponse = $client->location()->customField()->upload($locationId, $uploadParams);
        print_r($uploadResponse);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `CustomValue`

The `CustomValue` class, a sub-resource of `Location`, is used to manage custom values. These are dynamic key-value pairs that can be used for things like company logos, brand colors, or default text.

-----

#### `list(string $locationId): array|string`

Retrieves all custom values for a location.

  * **API Endpoint:** `GET /locations/{locationId}/customValues`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';

    try {
        $customValues = $client->location()->customValue()->list($locationId);
        print_r($customValues);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $locationId, array $params): array|string`

Creates a new custom value.

  * **API Endpoint:** `POST /locations/{locationId}/customValues`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): An associative array with the `name` and `value` of the custom value.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customValueParams = ['name' => 'brand_color', 'value' => '#ff5733'];

    try {
        $newCustomValue = $client->location()->customValue()->create($locationId, $customValueParams);
        print_r($newCustomValue);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $locationId, string $id): array|string`

Retrieves a single custom value by its ID.

  * **API Endpoint:** `GET /locations/{locationId}/customValues/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the custom value.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customValueId = 'cv_789';

    try {
        $valueDetails = $client->location()->customValue()->get($locationId, $customValueId);
        print_r($valueDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $locationId, string $id, array $params): array|string`

Updates an existing custom value.

  * **API Endpoint:** `PUT /locations/{locationId}/customValues/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the custom value.
      * `$params` (`array`): An associative array of the properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customValueId = 'cv_789';
    $updateData = ['value' => '#ff0000'];

    try {
        $updatedValue = $client->location()->customValue()->update($locationId, $customValueId, $updateData);
        print_r($updatedValue);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $locationId, string $id): array|string`

Deletes a custom value.

  * **API Endpoint:** `DELETE /locations/{locationId}/customValues/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the custom value to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $customValueId = 'cv_789';

    try {
        $response = $client->location()->customValue()->delete($locationId, $customValueId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Search`

The `Search` class is a sub-resource for searching locations and tasks.

-----

#### `search(array $params): array|string`

Searches for locations based on various criteria. The `query` method is an alias for this method.

  * **API Endpoint:** `GET /locations/search`

  * **Parameters:**

      * `$params` (`array`): An associative array of search criteria (e.g., `query`, `limit`, `offset`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $searchParams = ['query' => 'My New Location', 'limit' => 10];

    try {
        $searchResults = $client->location()->search()->search($searchParams);
        print_r($searchResults);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `query(array $params = []): array|string`

An alias for the `search` method.

  * **API Endpoint:** `GET /locations/search`

  * **Parameters:**

      * `$params` (`array`): An associative array of search criteria.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $searchParams = ['query' => 'Anytown', 'limit' => 5];

    try {
        $searchResults = $client->location()->search()->query($searchParams);
        print_r($searchResults);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `tasks(string $locationId, array $params = []): array|string`

Searches for tasks within a specific location.

  * **API Endpoint:** `GET /locations/{locationId}/tasks/search`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): An associative array of task search criteria (e.g., `assignedTo`, `status`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $taskSearchParams = ['assignedTo' => 'user_456', 'status' => 'pending'];

    try {
        $tasks = $client->location()->search()->tasks($locationId, $taskSearchParams);
        print_r($tasks);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Tag`

The `Tag` class, a sub-resource of `Location`, is used to manage tags associated with a location.

-----

#### `list(string $locationId): array|string`

Retrieves all tags for a specific location.

  * **API Endpoint:** `GET /locations/{locationId}/tags`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';

    try {
        $tags = $client->location()->tag()->list($locationId);
        print_r($tags);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $locationId, array $params): array|string`

Creates new tags in a location.

  * **API Endpoint:** `POST /locations/{locationId}/tags`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): An associative array containing the tags to create.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $newTags = ['tags' => ['new-lead', 'hot-prospect']];

    try {
        $response = $client->location()->tag()->create($locationId, $newTags);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $locationId, string $tagId): array|string`

Retrieves a single tag by its ID.

  * **API Endpoint:** `GET /locations/{locationId}/tags/{tagId}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$tagId` (`string`): The ID of the tag.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $tagId = 'tag_789';

    try {
        $tagDetails = $client->location()->tag()->get($locationId, $tagId);
        print_r($tagDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $locationId, string $tagId, array $params): array|string`

Updates a tag.

  * **API Endpoint:** `PUT /locations/{locationId}/tags/{tagId}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$tagId` (`string`): The ID of the tag to update.
      * `$params` (`array`): An associative array of properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $tagId = 'tag_789';
    $updateData = ['name' => 'updated-tag-name'];

    try {
        $updatedTag = $client->location()->tag()->update($locationId, $tagId, $updateData);
        print_r($updatedTag);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $locationId, string $tagId): array|string`

Deletes a tag.

  * **API Endpoint:** `DELETE /locations/{locationId}/tags/{tagId}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$tagId` (`string`): The ID of the tag to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $tagId = 'tag_789';

    try {
        $response = $client->location()->tag()->delete($locationId, $tagId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Template`

The `Template` class is a sub-resource of `Location` for managing templates.

-----

#### `list(string $locationId, string $originId, array $params = []): array|string`

Retrieves a list of templates for a location based on an `originId`.

  * **API Endpoint:** `GET /locations/{locationId}/templates`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$originId` (`string`): The ID of the origin, such as a snapshot ID.
      * `$params` (`array`): Optional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $originId = 'snap_abc';

    try {
        $templates = $client->location()->template()->list($locationId, $originId);
        print_r($templates);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $locationId, string $id): array|string`

Deletes a template from a location.

  * **API Endpoint:** `DELETE /locations/{locationId}/templates/{id}`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$id` (`string`): The ID of the template to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';
    $templateId = 'tmpl_xyz';

    try {
        $response = $client->location()->template()->delete($locationId, $templateId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Timezone`

The `Timezone` class is a sub-resource of `Location` for retrieving timezone information.

-----

#### `list(string $locationId): array|string`

Retrieves a list of all available timezones for a location.

  * **API Endpoint:** `GET /locations/{locationId}/timezones`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'loc_123';

    try {
        $timezones = $client->location()->timezone()->list($locationId);
        print_r($timezones);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```


