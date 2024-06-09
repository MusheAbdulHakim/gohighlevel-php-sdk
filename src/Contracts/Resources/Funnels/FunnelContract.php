<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels;

interface FunnelContract
{
    /**
     * Fetch List of Funnels
     *
     * @see https://highlevel.stoplight.io/docs/integrations/80d7ad39f1e90-fetch-list-of-funnels
     */
    public function list(string $locationId, array $params = []): array|string;

    /**
     * Fetch list of funnel pages
     *
     * @see https://highlevel.stoplight.io/docs/integrations/99a6409949f15-fetch-list-of-funnel-pages
     */
    public function pages(string $funnelId, string $locationId, int $limit, int $offset, array $params = []): array|string;

    /**
     * Funnel Redirects
     */
    public function redirect(): RedirectContract;
}
