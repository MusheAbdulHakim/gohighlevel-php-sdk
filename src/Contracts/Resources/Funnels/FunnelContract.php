<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels;

interface FunnelContract
{
    /**
     * Fetch List of Funnels
     *
     * @param  array<string>  $params
     * @return array<object,string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/80d7ad39f1e90-fetch-list-of-funnels
     */
    public function list(string $locationId, array $params = []): array|string;

    /**
     * Fetch list of funnel pages
     *
     *
     * @param  array<string>  $params
     * @return array<string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/99a6409949f15-fetch-list-of-funnel-pages
     */
    public function pages(string $funnelId, string $locationId, int $limit, int $offset, array $params = []): array|string;

    /**
     * Fetch count of funnel pages
     *
     * @param  array<string>  $params
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/6bee319f931fa-fetch-count-of-funnel-pages
     */
    public function countPages(string $funnelId, string $locationId, array $params = []): array|string;

    /**
     * Funnel Redirects
     */
    public function redirect(): RedirectContract;
}
