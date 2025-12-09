## Media Library API
### `MediaLibrary`

The `MediaLibrary` class provides a set of methods for interacting with the GoHighLevel media library. You can use it to upload, list, and delete files associated with a location or company.

-----

#### `delete(string $id, string $altId, string $altType): array|string`

Deletes a file from the media library.

  * **GoHighLevel API Endpoint:** `DELETE /medias/{id}`

  * **Parameters:**

      * `$id` (`string`): The ID of the file to delete.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $mediaLibrary = $client->mediaLibrary();

    try {
        $fileId = 'file_123';
        $locationId = 'loc_abc';
        $response = $mediaLibrary->delete($fileId, $locationId, 'location');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `upload(array $params): array|string`

Uploads a new file to the media library. The `$params` array is expected to be structured for a multipart/form-data request, containing the file content and metadata.

  * **GoHighLevel API Endpoint:** `POST /medias/upload-file`

  * **Parameters:**

      * `$params` (`array`): An associative array for a multipart request. It should contain at least the file data and the `altId`/`altType` of the parent resource.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $mediaLibrary = $client->mediaLibrary();

    $filePath = '/path/to/your/image.jpg';
    $uploadParams = [
        'multipart' => [
            [
                'name' => 'file',
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath),
            ],
            [
                'name' => 'altId',
                'contents' => 'loc_abc',
            ],
            [
                'name' => 'altType',
                'contents' => 'location',
            ],
        ],
    ];

    try {
        $response = $mediaLibrary->upload($uploadParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $altId, string $altType, string $sortBy, string $sortOrder, array $params = []): array|string`

Retrieves a list of files from the media library.

  * **GoHighLevel API Endpoint:** `GET /medias/files`

  * **Parameters:**

      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).
      * `$sortBy` (`string`): The field to sort the results by (e.g., `'fileName'`, `'createdAt'`).
      * `$sortOrder` (`string`): The sort order (`'asc'` or `'desc'`).
      * `$params` (`array`): An optional array for additional query parameters, such as pagination (`limit`, `offset`) or file type filters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $mediaLibrary = $client->mediaLibrary();

    try {
        $locationId = 'loc_abc';
        $files = $mediaLibrary->list($locationId, 'location', 'createdAt', 'desc', ['limit' => 20]);
        print_r($files);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```