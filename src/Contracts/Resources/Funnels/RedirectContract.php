<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels;

interface RedirectContract
{
    /**
     * Create Redirect
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/98aaa4819e58b-create-redirect
     */
    public function create(array $params): array|string;

    /**
     * Update Redirect By Id
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/42c343d756316-update-redirect-by-id
     */
    public function update(string $id, array $params): array|string;

    /**
     * Delete Redirect By Id
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/55c4fc25361eb-delete-redirect-by-id
     */
    public function delete(string $id, string $locationId): array|string;

    /**
     * Fetch List of Redirects
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/a1a9c79cd27ed-fetch-list-of-redirects
     */
    public function list(string $locationId, array $params = []): array|string;
}
