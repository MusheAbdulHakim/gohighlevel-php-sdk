## Courses Resource

### `Course`

The `Course` class provides methods for importing courses into a GoHighLevel account. This is typically used to transfer course content between locations.

-----

#### `import(string $locationId, string $userId, array $products): array|string`

This method initiates the process of importing one or more courses into a specified location. The courses to be imported are identified by their product IDs.

  * **GoHighLevel API Endpoint:** `POST /courses/courses-exporter/public/import`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location where the courses will be imported.
      * `$userId` (`string`): The ID of the user who will be the owner of the imported courses.
      * `$products` (`array`): An array of product IDs, where each product corresponds to a course to be imported.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'your_location_id_here';
    $userId = 'your_user_id_here';
    $productsToImport = ['product_1', 'product_2'];

    try {
        $importResponse = $client->courses()->import($locationId, $userId, $productsToImport);
        print_r($importResponse);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```