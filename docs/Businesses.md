## [Business Resource](https://highlevel.stoplight.io/docs/integrations/bb6b717cac89c-business-api)


### `Business`

The `Business` class provides a comprehensive set of methods for managing business entities within the GoHighLevel platform. You can perform all standard CRUD (Create, Read, Update, Delete) operations on businesses, as well as retrieve businesses filtered by location.

-----

#### `update(string $businessId, array $params = []): array|string`

This method updates an existing business entity. You can modify various properties of the business by passing them in the `$params` array.

  * **GoHighLevel API Endpoint:** `PUT /businesses/{businessId}`

  * **Parameters:**

      * `$businessId` (`string`): The unique identifier of the business to be updated.
      * `$params` (`array`): An associative array of the business properties you wish to modify.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $businessId = '63771dcac1116f0e21de8e12';

    $updateParams = [
        'name' => 'Updated Business Name',
        'email' => 'contact@updatedbusiness.com',
        'phone' => '+15551234567',
    ];

    try {
        $updatedBusiness = $client->businesses()->update($businessId, $updateParams);
        print_r($updatedBusiness);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $businessId): array|string`

This method permanently deletes a business from the GoHighLevel account.

  * **GoHighLevel API Endpoint:** `DELETE /businesses/{businessId}`

  * **Parameters:**

      * `$businessId` (`string`): The unique identifier of the business to be deleted.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $businessId = '63771dcac1116f0e21de8e12';

    try {
        $response = $client->businesses()->delete($businessId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $businessId): array|string`

This method retrieves the details of a single business by its ID.

  * **GoHighLevel API Endpoint:** `GET /businesses/{businessId}`

  * **Parameters:**

      * `$businessId` (`string`): The unique identifier of the business to retrieve.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $businessId = '63771dcac1116f0e21de8e12';

    try {
        $businessDetails = $client->businesses()->get($businessId);
        print_r($businessDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `getByLocation(string $locationId): array|string`

This method retrieves a list of all businesses associated with a specific location.

  * **GoHighLevel API Endpoint:** `GET /businesses/`

  * **Parameters:**

      * `$locationId` (`string`): The unique identifier of the location. The API will return all businesses linked to this location.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $locationId = 'location_abc123';

    try {
        $businesses = $client->businesses()->getByLocation($locationId);
        print_r($businesses);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(string $name, string $locationId, array $params = []): array|string`

This method creates a new business entity. You must provide the business name and a location to which it belongs.

  * **GoHighLevel API Endpoint:** `POST /businesses/`

  * **Parameters:**

      * `$name` (`string`): The name of the new business.
      * `$locationId` (`string`): The ID of the location to which the new business will be assigned.
      * `$params` (`array`): An associative array of additional business properties to set (e.g., `phone`, `email`, `website`, etc.).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $locationId = 'location_abc123';
    $businessName = 'My New Business LLC';

    $newBusinessParams = [
        'email' => 'info@mynewbusiness.com',
        'phone' => '+15559876543',
        'website' => 'www.mynewbusiness.com',
    ];

    try {
        $newBusiness = $client->businesses()->create($businessName, $locationId, $newBusinessParams);
        print_r($newBusiness);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```
