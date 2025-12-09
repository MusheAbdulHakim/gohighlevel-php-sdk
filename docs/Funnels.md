## Working with Funnels


### `Funnel`

The `Funnel` class is a resource for managing sales funnels and their pages. It lets you list funnels, retrieve details about their pages, count pages, and access the `Redirect` sub-resource.

-----

#### `list(string $locationId, array $params = []): array|string`

This method retrieves a list of all funnels within a specified location.

  * **GoHighLevel API Endpoint:** `GET /funnels/funnel/list/`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to retrieve funnels from.
      * `$params` (`array`): An optional array of query parameters to filter the results.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    try {
        $funnels = $client->funnels()->list('your_location_id');
        print_r($funnels);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `pages(string $funnelId, string $locationId, int $limit, int $offset, array $params = []): array|string`

Retrieves a paginated list of pages for a specific funnel.

  * **GoHighLevel API Endpoint:** `GET /funnels/page`

  * **Parameters:**

      * `$funnelId` (`string`): The ID of the funnel.
      * `$locationId` (`string`): The ID of the location the funnel belongs to.
      * `$limit` (`int`): The maximum number of pages to return.
      * `$offset` (`int`): The starting point for the list of pages.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $funnelId = 'funnel_123';
    $locationId = 'location_abc';

    try {
        $pages = $client->funnels()->pages($funnelId, $locationId, 10, 0);
        print_r($pages);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `countPages(string $funnelId, string $locationId, array $params = []): array|string`

Counts the total number of pages in a specific funnel.

  * **GoHighLevel API Endpoint:** `GET /funnels/page/count`

  * **Parameters:**

      * `$funnelId` (`string`): The ID of the funnel.
      * `$locationId` (`string`): The ID of the location the funnel belongs to.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $funnelId = 'funnel_123';
    $locationId = 'location_abc';

    try {
        $count = $client->funnels()->countPages($funnelId, $locationId);
        print_r($count);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `redirect(): RedirectContract`

Returns an instance of the `Redirect` resource for managing funnel redirects.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');

    // To create a new redirect
    $redirectParams = [
        'locationId' => 'location_abc',
        'domain' => 'my.domain.com',
        'url' => 'https://new.site.com',
    ];
    $newRedirect = $client->funnels()->redirect()->create($redirectParams);
    print_r($newRedirect);
    ```

-----

### `Redirect`

The `Redirect` class is a sub-resource of `Funnel` that provides methods to create, update, list, and delete URL redirects.

-----

#### `create(array $params): array|string`

Creates a new URL redirect.

  * **GoHighLevel API Endpoint:** `POST /funnels/lookup/redirect`

  * **Parameters:**

      * `$params` (`array`): An associative array containing the redirect details, such as `locationId`, `domain`, and the `url` to redirect to.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $redirectParams = [
        'locationId' => 'location_abc',
        'domain' => 'old-page.com/product',
        'url' => 'https://new-site.com/product-page',
    ];

    try {
        $newRedirect = $client->funnels()->redirect()->create($redirectParams);
        print_r($newRedirect);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $id, array $params): array|string`

Updates an existing redirect by its ID.

  * **GoHighLevel API Endpoint:** `PATCH /funnels/lookup/redirect/{id}`

  * **Parameters:**

      * `$id` (`string`): The ID of the redirect to update.
      * `$params` (`array`): An associative array of the properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $redirectId = 'redirect_456';
    $updateParams = [
        'url' => 'https://new-and-improved-page.com',
    ];

    try {
        $updatedRedirect = $client->funnels()->redirect()->update($redirectId, $updateParams);
        print_r($updatedRedirect);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $locationId, array $params = []): array|string`

Retrieves a list of all redirects for a specific location.

  * **GoHighLevel API Endpoint:** `GET /funnels/lookup/redirect/list`

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $locationId = 'location_abc';

    try {
        $redirects = $client->funnels()->redirect()->list($locationId);
        print_r($redirects);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $id, string $locationId): array|string`

Deletes a specific redirect.

  * **GoHighLevel API Endpoint:** `DELETE /funnels/lookup/redirect/{id}`

  * **Parameters:**

      * `$id` (`string`): The ID of the redirect to delete.
      * `$locationId` (`string`): The ID of the location the redirect belongs to.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $redirectId = 'redirect_456';
    $locationId = 'location_abc';

    try {
        $response = $client->funnels()->redirect()->delete($redirectId, $locationId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```