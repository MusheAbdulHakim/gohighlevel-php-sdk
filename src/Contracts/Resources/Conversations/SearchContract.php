<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations;

interface SearchContract
{
    /**
     * Returns a list of all conversations matching the search criteria along with the sort and filter options selected.
     *
     * @param  array  $parameters
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d45ae3189eea8-search-conversations
     */
    public function make(string $locationId, $parameters = []): array|string;
}
