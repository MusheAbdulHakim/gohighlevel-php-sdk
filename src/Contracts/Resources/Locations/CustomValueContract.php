<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations;

interface CustomValueContract
{
    /**
     * Get Custom Values
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d40742c5e3e7d-get-custom-values
     */
    public function list(string $locationId): array|string;

    /**
     * Create Custom Value
     *
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e0c3b7e6d196c-create-custom-value
     */
    public function create(string $locationId, array $params): array|string;

    /**
     * Get Custom Value
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/1c982c0816621-get-custom-value
     */
    public function get(string $locationId, string $id): array|string;

    /**
     * Update Custom Value
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/c5c9b99b0e74f-update-custom-value
     */
    public function update(string $locationId, string $id, array $params): array|string;

    /**
     * Delete Custom Value
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/40e00c29eb2da-delete-custom-value
     */
    public function delete(string $locationId, string $id): array|string;
}
