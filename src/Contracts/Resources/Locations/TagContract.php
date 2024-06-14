<?php

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations;

interface TagContract
{

    /**
     * Get Location Tags
     * @param string $locationId
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/00a65a984720b-get-location-tags
     */
    public function lists(string $locationId): array|string;

    /**
     * Get tag by id
     * Create Tag
     * @param string $locationId
     * @param array $params
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/64433faeaa52e-create-tag
     */
    public function create(string $locationId, array $params): array|string;

    /**
     * @param string $locationId
     * @param string $tagId
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/2be6f9044b427-get-tag-by-id
     */
    public function get(string $locationId, string $tagId): array|string;

    /**
     * @param string $locationId
     * @param string $tagId
     * @param array $params
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/809b211aaf37a-update-tag
     */
    public function update(string $locationId, string $tagId, array $params): array|string;

    /**
     * Delete a tag
     * @param string $locationId
     * @param string $tagId
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/8742f26722f45-delete-tag
     */
    public function delete(string $locationId, string $tagId): array|string;
}
