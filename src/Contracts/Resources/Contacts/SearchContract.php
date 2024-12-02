<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface SearchContract
{
    /**
     * Search Contacts
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/dbe4f3a00a106-search-contacts
     */
    public function query(array $params): array|string;

    /**
     * Get Duplicate Contact
     *
     *If Allow Duplicate Contact is disabled under Settings, the global unique identifier will be used for searching the contact. If the setting is enabled, first priority for search is email and the second priority will be phone.
     *
     *
     * @param  array<mixed>  $parameters
     * @return array<mixed>|string
     */
    public function getDuplicate(string $locationId, $parameters = []): array|string;
}
