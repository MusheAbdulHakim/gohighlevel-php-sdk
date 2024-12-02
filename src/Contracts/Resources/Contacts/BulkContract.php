<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface BulkContract
{
    /**
     * Add/Remove Contacts From Business
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/c37a9d47b1f0c-add-remove-contacts-from-business
     */
    public function addOrRemove(string $locationId, array $ids, string $businessId): array|string;
}
