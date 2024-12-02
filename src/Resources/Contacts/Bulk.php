<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\BulkContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Bulk implements BulkContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function addOrRemove(string $locationId, array $ids, string $businessId): array|string
    {
        $payload = Payload::create('contacts/bulk/business', [
            'locationId' => $locationId,
            'ids' => $ids,
            'businessId' => $businessId,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }
}
