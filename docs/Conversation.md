## Conversation Resource

### `Conversation`

The `Conversation` class serves as the main entry point for managing conversations. It allows you to perform CRUD operations on conversations and provides access to sub-resources for handling messages, emails, and searching.

-----

#### `get(string $conversationId): array|string`

Retrieves a single conversation by its ID. This method corresponds to the `GET /conversations/{conversationId}` endpoint.

  * **Parameters:**

      * `$conversationId` (`string`): The unique identifier of the conversation.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $conversationId = 'conversation_123';

    try {
        $conversation = $client->conversations()->get($conversationId);
        print_r($conversation);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $conversationId, array $params): array|string`

Updates an existing conversation. This method corresponds to the `PUT /conversations/{conversationId}` endpoint.

  * **Parameters:**

      * `$conversationId` (`string`): The unique identifier of the conversation.
      * `$params` (`array`): An associative array of the properties to update, such as `assignedTo`, `status`, or `tags`.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $conversationId = 'conversation_123';
    $updateParams = [
        'assignedTo' => 'user_456',
        'status' => 'new',
    ];

    try {
        $updatedConversation = $client->conversations()->update($conversationId, $updateParams);
        print_r($updatedConversation);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $conversationId): array|string`

Deletes a conversation. This method corresponds to the `DELETE /conversations/{conversationId}` endpoint.

  * **Parameters:**

      * `$conversationId` (`string`): The unique identifier of the conversation to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $conversationId = 'conversation_123';

    try {
        $response = $client->conversations()->delete($conversationId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(array $params): array|string`

Creates a new conversation. This method corresponds to the `POST /conversations/` endpoint.

  * **Parameters:**

      * `$params` (`array`): An associative array of conversation properties, including `contactId`, `locationId`, and `channelType`.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $createParams = [
        'contactId' => 'contact_789',
        'locationId' => 'location_abc',
        'channelType' => 'sms',
    ];

    try {
        $newConversation = $client->conversations()->create($createParams);
        print_r($newConversation);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `email(): EmailContract`

Returns an instance of the `Email` resource for managing conversation-related emails.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');

    // Get details of a specific email message
    $emailDetails = $client->conversations()->email()->get('email_msg_123');
    print_r($emailDetails);
    ```

-----

#### `message(): MessageContract`

Returns an instance of the `Message` resource for managing messages within conversations.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');

    // Send a new message
    $message = $client->conversations()->message()->send('sms', 'contact_123', ['body' => 'Hello there!']);
    print_r($message);
    ```

-----

#### `search(): SearchContract`

Returns an instance of the `Search` resource for searching conversations.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');

    // Search conversations in a location
    $searchResults = $client->conversations()->search()->make('location_abc', ['query' => 'status:new']);
    print_r($searchResults);
    ```

-----

### `Email`

The `Email` class, a sub-resource of `Conversation`, provides methods for managing email messages.

-----

#### `get(string $id): array|string`

Retrieves a specific email message by its ID. This method corresponds to the `GET /conversations/messages/email/{id}` endpoint.

  * **Parameters:**

      * `$id` (`string`): The unique identifier of the email message.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $emailId = 'email_msg_123';

    try {
        $emailDetails = $client->conversations()->email()->get($emailId);
        print_r($emailDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `cancelSchedule(string $emailMessageId): array|string`

Cancels a scheduled email message. This method corresponds to the `DELETE /conversations/messages/email/{emailMessageId}/schedule` endpoint.

  * **Parameters:**

      * `$emailMessageId` (`string`): The ID of the scheduled email message to cancel.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $emailId = 'scheduled_email_456';

    try {
        $response = $client->conversations()->email()->cancelSchedule($emailId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Message`

The `Message` class, a sub-resource of `Conversation`, provides a comprehensive set of methods for sending, retrieving, and managing messages of various types (e.g., SMS, MMS, etc.) within conversations.

-----

#### `get(string $id): array|string`

Retrieves a single message by its ID. This method corresponds to the `GET /conversations/messages/{id}` endpoint.

  * **Parameters:**

      * `$id` (`string`): The unique identifier of the message.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $messageId = 'message_789';

    try {
        $message = $client->conversations()->message()->get($messageId);
        print_r($message);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `byConversation(string $conversationId, $queryParams = []): array|string`

Retrieves all messages for a specific conversation. This method corresponds to the `GET /conversations/{conversationId}/messages` endpoint.

  * **Parameters:**

      * `$conversationId` (`string`): The ID of the conversation.
      * `$queryParams` (`array`): Optional query parameters for filtering (e.g., `limit`, `skip`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $conversationId = 'conversation_123';

    try {
        $messages = $client->conversations()->message()->byConversation($conversationId, ['limit' => 20]);
        print_r($messages);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `send(string $type, string $contactId, $params = []): array|string`

Sends a new message (e.g., SMS, MMS, email, etc.) to a contact. This method corresponds to the `POST /conversations/messages` endpoint.

  * **Parameters:**

      * `$type` (`string`): The type of message to send (e.g., `'sms'`, `'mms'`, `'email'`).
      * `$contactId` (`string`): The ID of the recipient contact.
      * `$params` (`array`): An associative array containing message-specific details like `body`, `subject`, `fromNumber`, etc.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $contactId = 'contact_789';
    $messageParams = [
        'body' => 'Hi, just following up on your inquiry.',
        'fromNumber' => '+15551234567',
    ];

    try {
        $sentMessage = $client->conversations()->message()->send('sms', $contactId, $messageParams);
        print_r($sentMessage);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `inbound(string $type, string $conversationId, string $conversationProviderId, array $params = []): array|string`

Simulates an inbound message to a conversation. This is typically used for testing or integrating with third-party providers. The method corresponds to the `POST /conversations/messages/inbound` endpoint.

  * **Parameters:**

      * `$type` (`string`): The message type (e.g., `'sms'`).
      * `$conversationId` (`string`): The ID of the conversation.
      * `$conversationProviderId` (`string`): The unique ID of the message from the provider.
      * `$params` (`array`): An associative array of additional message details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $inboundParams = [
        'body' => 'Hello, I am interested in your services.',
        'locationId' => 'location_abc',
    ];

    try {
        $response = $client->conversations()->message()->inbound('sms', 'conversation_123', 'provider_msg_456', $inboundParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `outbound(string $type, string $conversationId, string $conversationProviderId, array $params = []): array|string`

This method appears to be a duplicate of the `inbound` method in the provided code, and it also calls the `POST /conversations/messages/inbound` endpoint.

  * **Parameters:**

      * `$type` (`string`): The message type.
      * `$conversationId` (`string`): The ID of the conversation.
      * `$conversationProviderId` (`string`): The unique ID of the message from the provider.
      * `$params` (`array`): An associative array of additional message details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $outboundParams = [
        'body' => 'I am writing from your company to assist you.',
        'locationId' => 'location_abc',
    ];

    try {
        $response = $client->conversations()->message()->outbound('sms', 'conversation_123', 'provider_msg_789', $outboundParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `cancel(string $messageId): array|string`

Cancels a scheduled message. This method corresponds to the `DELETE /conversations/messages/{messageId}/schedule` endpoint.

  * **Parameters:**

      * `$messageId` (`string`): The ID of the scheduled message to cancel.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $messageId = 'scheduled_msg_123';

    try {
        $response = $client->conversations()->message()->cancel($messageId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `upload(string $conversationId, string $locationId, array $attachmentUrls): array|string`

This method seems to be incorrectly implemented, as the `upload` method in the provided code is trying to use `attachmentUrls` in the `Payload::upload()` call, which is not a standard way to upload files via multipart/form-data. The GoHighLevel API typically expects a `multipart` array with `name`, `contents`, and `filename` for file uploads. The provided code is likely to fail as written.

  * **Parameters:**

      * `$conversationId` (`string`): The ID of the conversation.
      * `$locationId` (`string`): The ID of the location.
      * `$attachmentUrls` (`array`): An array of attachment URLs to upload.

  * **Example Usage (Conceptual):**

    ```php
    // The provided implementation is flawed. A correct implementation would
    // involve a multipart request with actual file data or a URL to a file.
    // This is a conceptual example for the intended functionality.

    // use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    // $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    // $conversationId = 'conversation_123';
    // $locationId = 'location_abc';
    // $attachmentUrls = ['http://example.com/image.jpg'];

    // try {
    //     $uploadResponse = $client->conversations()->message()->upload($conversationId, $locationId, $attachmentUrls);
    //     print_r($uploadResponse);
    // } catch (Exception $e) {
    //     echo "Error: " . $e->getMessage();
    // }
    ```

-----

#### `updateStatus(string $messageId, $params = []): array|string`

Updates the status of a message. The provided method implementation doesn't pass any parameters to the API call, which is likely incorrect. The GoHighLevel API for this endpoint expects a body with a `status` field.

  * **Parameters:**

      * `$messageId` (`string`): The ID of the message.
      * `$params` (`array`): An associative array with the `status` to update to (e.g., `'read'`).

  * **Example Usage (Conceptual):**

    ```php
    // The provided implementation is flawed. It should pass the status in the payload.

    // use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    // $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    // $messageId = 'message_123';
    // $updateParams = ['status' => 'read'];

    // try {
    //     $response = $client->conversations()->message()->updateStatus($messageId, $updateParams);
    //     print_r($response);
    // } catch (Exception $e) {
    //     echo "Error: " . $e->getMessage();
    // }
    ```

-----

#### `getRecording(string $locationId, string $messageId): array|string`

Retrieves the recording for a voice message (e.g., call). This method corresponds to the `GET /conversations/messages/{messageId}/locations/{locationId}/recording` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$messageId` (`string`): The ID of the voice message.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $locationId = 'location_abc';
    $messageId = 'voice_msg_123';

    try {
        $recording = $client->conversations()->message()->getRecording($locationId, $messageId);
        print_r($recording);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `getTranscript(string $locationId, string $messageId): array|string`

Retrieves the transcript for a voice message. This method corresponds to the `GET /conversations/locations/{locationId}/messages/{messageId}/transcription` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$messageId` (`string`): The ID of the voice message.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $locationId = 'location_abc';
    $messageId = 'voice_msg_123';

    try {
        $transcript = $client->conversations()->message()->getTranscript($locationId, $messageId);
        print_r($transcript);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `downloadTranscript(string $locationId, string $messageId): array|string`

Downloads the transcript for a voice message. This method corresponds to the `GET /conversations/locations/{locationId}/messages/{messageId}/transcription/download` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location.
      * `$messageId` (`string`): The ID of the voice message.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $locationId = 'location_abc';
    $messageId = 'voice_msg_123';

    try {
        $transcriptData = $client->conversations()->message()->downloadTranscript($locationId, $messageId);
        // The response will be the raw file data
        // file_put_contents('transcript.txt', $transcriptData);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Search`

The `Search` class, a sub-resource of `Conversation`, provides a method for searching conversations.

-----

#### `make(string $locationId, $parameters = []): array|string`

Searches for conversations based on various criteria within a specified location. This method corresponds to the `GET /conversations/search` endpoint.

  * **Parameters:**

      * `$locationId` (`string`): The ID of the location to search within.
      * `$parameters` (`array`): An associative array of search parameters, such as `contactId`, `assignedTo`, `channelType`, `status`, etc.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-04-15');
    $locationId = 'location_abc';
    $searchParams = [
        'contactId' => 'contact_123',
        'status' => 'new',
    ];

    try {
        $searchResults = $client->conversations()->search()->make($locationId, $searchParams);
        print_r($searchResults);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```



