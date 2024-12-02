<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations;

interface SearchContract
{
    /**
     * Search Sub-Account (Formerly Location)
     *
     * @param  array<string>  $params
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/12f3fb56990d3-search-locations
     */
    public function search(array $params): array|string;

    /**
     * Task Search Filter
     *
     * @param  array<string>  $params
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/8d73480560089-task-search-filter
     */
    public function tasks(string $locationId, array $params = []): array|string;
}
