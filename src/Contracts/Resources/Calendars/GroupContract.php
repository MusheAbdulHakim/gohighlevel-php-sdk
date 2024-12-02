<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars;

interface GroupContract
{
    /**
     * Get all calendar groups in a location.
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/89e47b6c05e67-get-groups
     */
    public function get(string $locationId): array|string;

    /**
     * Create Calendar Group
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/fefceb241288c-create-calendar-group
     */
    public function create(array $params): array|string;

    /**
     * Validate if group slug is available or not.
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/afefaa9b33ca0-validate-group-slug
     */
    public function validate(string $locationId, string $slug, bool $available): array|string;

    /**
     * Delete Group
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e8c53752f025d-delete-group
     */
    public function delete(string $groupId): array|string;

    /**
     * Edit group
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/585481332e909-edit-group
     */
    public function update(string $groupId, array $params = []): array|string;

    /**
     * Disable Group
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/aed8aeb313d97-disable-group
     */
    public function disable(string $groupId, bool $isActive): array|string;
}
