## Forms Resource

### `Form`

The `Form` class provides methods for managing forms and their submissions within a GoHighLevel account. You can retrieve form submissions, upload files to custom fields, and list all forms for a specific location.

-----

#### `submissions(string $locationId, array $params = []): array|string`

This method retrieves a list of all form submissions for a given location.

  * **GoHighLevel API Endpoint:** `GET /forms/submissions`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to retrieve submissions from.
      * `$params` (`array`): An optional array of query parameters to filter the submissions (e.g., by form ID, submission date, etc.).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'your_location_id_here';

    try {
        $submissions = $client->forms()->submissions($locationId);
        print_r($submissions);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `uploadToCustomFields(string $locationId, string $contactId): array|string`

This method uploads files to a contact's custom fields. The API endpoint for this is a `POST` request.

  * **GoHighLevel API Endpoint:** `POST /forms/upload-custom-files`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$contactId` (`string`): The ID of the contact whose custom fields will be updated.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'your_location_id_here';
    $contactId = 'your_contact_id_here';

    try {
        // Note: The actual file content would need to be included in the payload.
        // The current method implementation only sends the contactId and locationId in the URL.
        $response = $client->forms()->uploadToCustomFields($locationId, $contactId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $locationId, array $params = []): array|string`

This method retrieves a list of all forms for a specific location.

  * **GoHighLevel API Endpoint:** `GET /forms/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to retrieve forms from.
      * `$params` (`array`): An optional array of query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'your_location_id_here';

    try {
        $forms = $client->forms()->list($locationId);
        print_r($forms);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

