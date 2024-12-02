<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations;

/**
 * Sub-Account (Formerly location) API
 *
 * @see https://highlevel.stoplight.io/docs/integrations/e283eac258a96-location-api
 */
interface LocationContract
{
    /**
     * Create Location
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7cfc7963eda7c-create-location
     */
    public function create(array $params): array|string;

    /**
     * Get Location
     *
     * Get details of a location by passing the location id
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d777490312af4-get-location
     */
    public function get(string $locationId): array|string;

    /**
     * Put Location
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cc00a2e3e4d70-put-location
     */
    public function update(string $locationId, array $params = []): array|string;

    /**
     * Delete Location
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/54dd4c281f465-delete-location
     */
    public function delete(string $locationId, array $params = []): array|string;

    public function tag(): TagContract;

    public function customField(): CustomFieldContract;

    public function customValue(): CustomValueContract;

    public function template(): TemplateContract;

    public function search(): SearchContract;

    public function timezone(): TimezoneContract;
}
