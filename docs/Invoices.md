## Invoices Resource

### `Invoice`

The `Invoice` class is a central resource for managing invoices. It allows you to create, retrieve, update, and delete invoices, as well as perform other related actions such as voiding, sending, and recording payments. It also provides access to sub-resources for managing invoice templates, schedules, and Text2Pay settings.

-----

#### `generateNumber(string $altId, string $altType): array|string`

Generates a new invoice number for a given location or company.

  * **GoHighLevel API Endpoint:** `GET /invoices/generate-invoice-number`

  * **Parameters:**

      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();

    try {
        $invoiceNumber = $invoices->generateNumber('loc_abc', 'location');
        print_r($invoiceNumber);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $invoiceId, array $params = []): array|string`

Retrieves a single invoice by its ID.

  * **GoHighLevel API Endpoint:** `GET /invoices/{invoiceId}` (Note: The provided code uses `PUT`, which is incorrect for a GET operation. It should be a `GET` request without a request body).

  * **Parameters:**

      * `$invoiceId` (`string`): The ID of the invoice to retrieve.
      * `$params` (`array`): Optional parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $invoiceId = 'inv_123';

    try {
        $invoiceDetails = $invoices->get($invoiceId);
        print_r($invoiceDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $invoiceId, array $params): array|string`

Updates an existing invoice.

  * **GoHighLevel API Endpoint:** `PUT /invoices/{invoiceId}`

  * **Parameters:**

      * `$invoiceId` (`string`): The ID of the invoice to update.
      * `$params` (`array`): An associative array of the invoice properties to modify.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $invoiceId = 'inv_123';
    $updateParams = ['dueDate' => '2025-09-11T17:00:00Z'];

    try {
        $updatedInvoice = $invoices->update($invoiceId, $updateParams);
        print_r($updatedInvoice);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $invoiceId, string $altId, string $altType): array|string`

Deletes an invoice.

  * **GoHighLevel API Endpoint:** `DELETE /invoices/{invoiceId}`

  * **Parameters:**

      * `$invoiceId` (`string`): The ID of the invoice to delete.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $invoiceId = 'inv_123';
    $locationId = 'loc_abc';

    try {
        $response = $invoices->delete($invoiceId, $locationId, 'location');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `void(string $invoiceId, string $altId, string $altType): array|string`

Voids an invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/{invoiceId}/void`

  * **Parameters:**

      * `$invoiceId` (`string`): The ID of the invoice to void.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $invoiceId = 'inv_123';
    $locationId = 'loc_abc';

    try {
        $response = $invoices->void($invoiceId, $locationId, 'location');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `send(string $invoiceId, array $params): array|string`

Sends an invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/{invoiceId}/send`

  * **Parameters:**

      * `$invoiceId` (`string`): The ID of the invoice to send.
      * `$params` (`array`): An associative array of parameters for sending the invoice (e.g., `toEmail`, `toPhone`, `message`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $invoiceId = 'inv_123';
    $sendParams = [
        'toEmail' => 'client@example.com',
        'subject' => 'Your Invoice',
    ];

    try {
        $response = $invoices->send($invoiceId, $sendParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `recordPayment(string $invoiceId, array $params): array|string`

Records a payment for an invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/{invoiceId}/record-payment`

  * **Parameters:**

      * `$invoiceId` (`string`): The ID of the invoice.
      * `$params` (`array`): An associative array of payment details (e.g., `amount`, `date`, `paymentMethod`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $invoiceId = 'inv_123';
    $paymentParams = [
        'amount' => 100.00,
        'date' => '2025-08-11',
    ];

    try {
        $response = $invoices->recordPayment($invoiceId, $paymentParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `create(array $params): array|string`

Creates a new invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/`

  * **Parameters:**

      * `$params` (`array`): An associative array of the invoice details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $createParams = [
        'altId' => 'loc_abc',
        'altType' => 'location',
        'contactId' => 'contact_456',
        'dueDate' => '2025-09-11',
        'lineItems' => [
            [
                'name' => 'Product A',
                'price' => 50,
                'quantity' => 2,
            ],
        ],
    ];

    try {
        $newInvoice = $invoices->create($createParams);
        print_r($newInvoice);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $altId, string $altType, string $limit, string $offset, array $params = []): array|string`

Retrieves a paginated list of invoices for a location or company.

  * **GoHighLevel API Endpoint:** `GET /invoices/`

  * **Parameters:**

      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).
      * `$limit` (`string`): The maximum number of invoices to return.
      * `$offset` (`string`): The starting point for the list of invoices.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();

    try {
        $invoiceList = $invoices->list('loc_abc', 'location', '10', '0');
        print_r($invoiceList);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `template(): TemplateContract`

Returns an instance of the `Template` sub-resource for managing invoice templates.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();

    // To list invoice templates
    $templates = $invoices->template()->list('loc_abc', 'location', '10', '0');
    print_r($templates);
    ```

-----

#### `schedule(): ScheduleContract`

Returns an instance of the `Schedule` sub-resource for managing scheduled invoices.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();

    // To create a scheduled invoice
    $scheduleParams = [
        'contactId' => 'contact_456',
        'locationId' => 'loc_abc',
        'recurring' => true,
    ];
    $scheduledInvoice = $invoices->schedule()->create($scheduleParams);
    print_r($scheduledInvoice);
    ```

-----

#### `text2pay(): Text2payContract`

Returns an instance of the `Text2pay` sub-resource for managing Text2Pay settings.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $invoices = $client->invoices();
    $text2payParams = [
        'invoiceId' => 'inv_123',
        'contactId' => 'contact_456',
    ];

    // To create a Text2Pay link
    $text2pay = $invoices->text2pay()->create($text2payParams);
    print_r($text2pay);
    ```

-----

### `Schedule`

The `Schedule` class is a sub-resource of `Invoice` for managing scheduled and recurring invoices.

-----

#### `create(array $params): array|string`

Creates a new scheduled invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/schedule/`

  * **Parameters:**

      * `$params` (`array`): An associative array of the scheduled invoice details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleParams = [
        'altId' => 'loc_abc',
        'altType' => 'location',
        'contactId' => 'contact_456',
        'recurring' => true,
        'lineItems' => [
            [
                'name' => 'Monthly Service',
                'price' => 100,
                'quantity' => 1,
            ],
        ],
    ];

    try {
        $scheduledInvoice = $schedule->create($scheduleParams);
        print_r($scheduledInvoice);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $altId, string $altType, string $limit, string $offset, array $params = []): array|string`

Retrieves a paginated list of scheduled invoices for a location or company.

  * **GoHighLevel API Endpoint:** `GET /invoices/schedule/`

  * **Parameters:**

      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).
      * `$limit` (`string`): The maximum number of schedules to return.
      * `$offset` (`string`): The starting point for the list.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();

    try {
        $scheduleList = $schedule->list('loc_abc', 'location', '10', '0');
        print_r($scheduleList);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $scheduleId, string $altId, string $altType): array|string`

Retrieves a single scheduled invoice by its ID.

  * **GoHighLevel API Endpoint:** `GET /invoices/schedule/{scheduleId}`

  * **Parameters:**

      * `$scheduleId` (`string`): The ID of the scheduled invoice.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleId = 'sch_123';

    try {
        $scheduleDetails = $schedule->get($scheduleId, 'loc_abc', 'location');
        print_r($scheduleDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $scheduleId, string $altId, string $altType, array $params = []): array|string`

Updates a scheduled invoice.

  * **GoHighLevel API Endpoint:** `PUT /invoices/schedule/{scheduleId}`

  * **Parameters:**

      * `$scheduleId` (`string`): The ID of the scheduled invoice.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID.
      * `$params` (`array`): An associative array of properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleId = 'sch_123';
    $updateParams = ['frequency' => 'monthly'];

    try {
        $updatedSchedule = $schedule->update($scheduleId, 'loc_abc', 'location', $updateParams);
        print_r($updatedSchedule);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $scheduleId, string $altId, string $altType): array|string`

Deletes a scheduled invoice.

  * **GoHighLevel API Endpoint:** `DELETE /invoices/schedule/{scheduleId}`

  * **Parameters:**

      * `$scheduleId` (`string`): The ID of the scheduled invoice.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleId = 'sch_123';

    try {
        $response = $schedule->delete($scheduleId, 'loc_abc', 'location');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `invoice(string $scheduleId, string $altId, string $altType, array $params): array|string`

Manually creates an invoice from a scheduled invoice. This is likely used to generate an invoice for a specific instance of a recurring schedule.

  * **GoHighLevel API Endpoint:** `POST /invoices/schedule/{scheduleId}/schedule`

  * **Parameters:**

      * `$scheduleId` (`string`): The ID of the scheduled invoice.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID.
      * `$params` (`array`): An associative array of parameters for creating the invoice.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleId = 'sch_123';
    $invoiceParams = ['invoiceDate' => '2025-08-11'];

    try {
        $newInvoice = $schedule->invoice($scheduleId, 'loc_abc', 'location', $invoiceParams);
        print_r($newInvoice);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `autoPayment(string $scheduleId, string $altId, string $altType, array $params): array|string`

Sets or updates auto-payment settings for a scheduled invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/schedule/{scheduleId}/auto-payment`

  * **Parameters:**

      * `$scheduleId` (`string`): The ID of the scheduled invoice.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string` (`'location'` or `'company'`)).
      * `$params` (`array`): An associative array containing auto-payment details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleId = 'sch_123';
    $autoPaymentParams = ['enabled' => true, 'cardId' => 'card_xyz'];

    try {
        $response = $schedule->autoPayment($scheduleId, 'loc_abc', 'location', $autoPaymentParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `cancel(string $scheduleId, string $altId, string $altType): array|string`

Cancels a scheduled invoice. This is different from deleting it, as it likely stops future invoices from being generated.

  * **GoHighLevel API Endpoint:** `POST /invoices/schedule/{scheduleId}/cancel`

  * **Parameters:**

      * `$scheduleId` (`string`): The ID of the scheduled invoice.
      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $schedule = $client->invoices()->schedule();
    $scheduleId = 'sch_123';

    try {
        $response = $schedule->cancel($scheduleId, 'loc_abc', 'location');
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Template`

The `Template` class is a sub-resource of `Invoice` for managing invoice templates.

-----

#### `create(array $params): array|string`

Creates a new invoice template.

  * **GoHighLevel API Endpoint:** `POST /invoices/template/`

  * **Parameters:**

      * `$params` (`array`): An associative array of the template details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $template = $client->invoices()->template();
    $templateParams = [
        'name' => 'Standard Invoice Template',
        'locationId' => 'loc_abc',
        'lineItems' => [
            ['name' => 'Service', 'price' => 100],
        ],
    ];

    try {
        $newTemplate = $template->create($templateParams);
        print_r($newTemplate);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `list(string $altId, string $altType, string $limit, string $offset, array $params = []): array|string`

Retrieves a paginated list of invoice templates for a location or company.

  * **GoHighLevel API Endpoint:** `GET /invoices/template/`

  * **Parameters:**

      * `$altId` (`string`): The ID of the location or company.
      * `$altType` (`string`): The type of the ID (`'location'` or `'company'`).
      * `$limit` (`string`): The maximum number of templates to return.
      * `$offset` (`string`): The starting point for the list.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $template = $client->invoices()->template();

    try {
        $templateList = $template->list('loc_abc', 'location', '10', '0');
        print_r($templateList);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `get(string $templateId, array $params = []): array|string`

Retrieves a single invoice template by its ID.

  * **GoHighLevel API Endpoint:** `GET /invoices/template/{templateId}/`

  * **Parameters:**

      * `$templateId` (`string`): The ID of the template.
      * `$params` (`array`): An optional array of additional query parameters.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $template = $client->invoices()->template();
    $templateId = 'tmpl_xyz';

    try {
        $templateDetails = $template->get($templateId);
        print_r($templateDetails);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $templateId, array $params = []): array|string`

Updates an existing invoice template.

  * **GoHighLevel API Endpoint:** `PUT /invoices/template/{templateId}/`

  * **Parameters:**

      * `$templateId` (`string`): The ID of the template to update.
      * `$params` (`array`): An associative array of the template properties to modify.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $template = $client->invoices()->template();
    $templateId = 'tmpl_xyz';
    $updateParams = ['name' => 'Updated Invoice Template'];

    try {
        $updatedTemplate = $template->update($templateId, $updateParams);
        print_r($updatedTemplate);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `delete(string $templateId): array|string`

Deletes an invoice template.

  * **GoHighLevel API Endpoint:** `DELETE /invoices/template/{templateId}/`

  * **Parameters:**

      * `$templateId` (`string`): The ID of the template to delete.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $template = $client->invoices()->template();
    $templateId = 'tmpl_xyz';

    try {
        $response = $template->delete($templateId);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

### `Text2pay`

The `Text2pay` class is a sub-resource of `Invoice` for managing Text2Pay functionality, which allows clients to pay invoices via a link sent over SMS.

-----

#### `create(array $params): array|string`

Creates a new Text2Pay link for an invoice.

  * **GoHighLevel API Endpoint:** `POST /invoices/text2pay/`

  * **Parameters:**

      * `$params` (`array`): An associative array containing the invoice ID, contact ID, and other details.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $text2pay = $client->invoices()->text2pay();
    $text2payParams = [
        'invoiceId' => 'inv_123',
        'contactId' => 'contact_456',
        'fromNumber' => '+15551234567',
    ];

    try {
        $response = $text2pay->create($text2payParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```

-----

#### `update(string $id, array $params): array|string`

Updates a Text2Pay link. This endpoint may be used to re-send the link or modify its status.

  * **GoHighLevel API Endpoint:** `POST /invoices/text2pay/{id}/`

  * **Parameters:**

      * `$id` (`string`): The ID of the Text2Pay link.
      * `$params` (`array`): An associative array of properties to update.

  * **Example Usage:**

    ```php
    use MusheAbdulHakim\GoHighLevel\GoHighLevel;

    $client = GoHighLevel::client('ACCESS_TOKEN', '2021-07-28');
    $text2pay = $client->invoices()->text2pay();
    $text2payId = 'txtp_789';
    $updateParams = ['resend' => true];

    try {
        $response = $text2pay->update($text2payId, $updateParams);
        print_r($response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ```
