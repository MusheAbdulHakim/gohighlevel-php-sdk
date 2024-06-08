<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface SearchContract
{
    /**
     * Get Duplicate Contact
     *
     *If Allow Duplicate Contact is disabled under Settings, the global unique identifier will be used for searching the contact. If the setting is enabled, first priority for search is email and the second priority will be phone.
     *
     * @param  array  $parameters
     * @return void
     */
    public function getDuplicate(string $locationId, $parameters = []);
}
