<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities;

interface OpportunityContract
{
    /**
     * Get Opportunity
     *
     *
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/31798edaafcba-get-opportunity
     */
    public function get(string $id): array|string;

    /**
     * Delete Opportunity
     *
     *
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/11568af679dff-delete-opportunity
     */
    public function delete(string $id): array|string;

    /**
     * Update Opportunity
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ca75b3ab9e828-update-opportunity
     */
    public function update(string $id, array $params = []): array|string;

    /**
     * Update Opportunity Status
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d595e6fa2b666-update-opportunity-status
     */
    public function updateStatus(string $id, string $status): array|string;

    /**
     * Upsert Opportunity
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9df1c12e5da99-upsert-opportunity
     */
    public function upsert(string $pipelineId, string $locationId, string $contactId, array $params = []): array|string;

    /**
     * Create Opportunity
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/802093aa63900-create-opportunity
     */
    public function create(array $params = []): array|string;

    /**
     * Search Opportunity
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/a163e98c45b8d-search-opportunity
     */
    public function search(string $locationId, array $params = []): array|string;

    /**
     * Get Pipelines
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/927589990bc39-get-pipelines
     */
    public function pipelines(string $locationId): array|string;

    public function follower(): FollowerContract;
}
