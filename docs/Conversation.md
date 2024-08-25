## Conversation Api

```php
$client = GoHighLevel::client($access_token,'2021-04-15')->conversations();
```
### Get Conversation
```php

    $data = $client->get(string $conversationId);
```

### Update Conversation
```php

    $conversation = $client->update(string $conversationId, array $params);
```

### Delete Conversation
```php

    $data = $client->delete(string $conversationId);
```
### Create Conversation
```php

    $data = $client->create(array $params);
```

### Search Conversations
```php

    $data = $client->search()->make(string $locationId, [
        //parameters
    ]);
```

## Email

### Get email by Id
```php

    $data = $client->email()->get(string $id);
```

### Cancel a scheduled email message.
```php

    $data = $client->email()->cancelSchedule(string $emailMessageId);
```

## Messages

### Get message by message id
```php

    $data = $client->message()->get(string $id);
```

### Get messages by conversation id
```php

    $data = $client->message()->byConversation(string $conversationId, [
        // params
    ]);
```


### Send a new message
```php

    $data = $client->message()->send(string $type, string $contactId, [
        //params
    ]);
```


### Add an inbound message
```php

    $data = $client->message()->inbound(string $type, string $conversationId, string $conversationProviderId, [
        //params
    ]);
```

### Add an external outbound call
```php

    $data = $client->message()->outbound(string $type, string $conversationId, string $conversationProviderId, [
        //parameters
    ]);
```


### Cancel a scheduled message.
```php

    $data = $client->message()->cancel(string $messageId);
```


### Upload file attachments
```php

    $data = $client->message()->upload(string $conversationId, string $locationId, array $attachmentUrls);
```

### Update message status
```php

    $data = $client->message()->updateStatus(string $messageId, [
        //params
    ]);
```

### Get Recording by Message ID
```php

    $data = $client->message()->getRecording(string $locationId, string $messageId);
```

### Get transcription by Message ID
```php

    $data = $client->message()->getTranscript(string $locationId, string $messageId);
```

### Download transcription by Message ID
```php

    $data = $client->message()->downloadTranscript(string $locationId, string $messageId);
```



