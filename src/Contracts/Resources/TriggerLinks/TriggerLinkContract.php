<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\TriggerLinks;

/**
 *links API

 *
 * @see https://highlevel.stoplight.io/docs/integrations/85c4db13a5d69-links-api
 */
interface TriggerLinkContract
{
    /**
     * Update Link
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7fb0921457bdb-update-link
     */
    public function update(string $linkId, array $params): array|string;

    /**
     * Delete Link
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/b38b571ee30bd-delete-link
     */
    public function delete(string $linkId): array|string;

    /**
     * Get Links
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7b6e00ee0f653-get-links
     */
    public function get(string $locationId): array|string;

    /**
     * Create Link
     *
     * @see https://highlevel.stoplight.io/docs/integrations/30442546481af-create-link
     */
    public function create(array $params): array|string;
}
