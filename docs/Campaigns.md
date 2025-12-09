## Campaigns Resource


The `Campaign` class provides methods to manage marketing campaigns within a GoHighLevel location.

-----

#### `get(string $locationId, array $params = []): array|string`

This method retrieves a list of all campaigns associated with a specific location. It corresponds to the `GET /campaigns/` endpoint in the GoHighLevel API.

  * **GoHighLevel API Endpoint:** `GET /campaigns/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to retrieve campaigns from.
      * `$params` (`array`): An optional array of query parameters to filter the results. For example, you can filter by campaign name or other properties.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN','2021-04-15');

    $locationId = 'your_location_id_here';

    try {
        $campaigns = $client->campaigns()->get($locationId);
        print_r($campaigns);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```