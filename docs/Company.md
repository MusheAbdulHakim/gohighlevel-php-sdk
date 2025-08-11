## Companies Resource

The `Company` class provides methods for interacting with company-related endpoints in the GoHighLevel API.

-----

#### `get(string $companyId): array|string`

This method retrieves a single company's details using its ID. It corresponds to the GoHighLevel API's `GET /companies/{companyId}` endpoint.

  * **GoHighLevel API Endpoint:** `GET /companies/{companyId}`

  * **Parameters:**

      * `$companyId` (`string`): The unique identifier of the company.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client($access_token,'2021-07-28');
    $companyId = 'your_company_id_here';

    try {
        $companyDetails = $client->companies()->get($companyId);
        print_r($companyDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```