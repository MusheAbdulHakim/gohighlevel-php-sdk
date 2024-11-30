<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources;

/**
 * Business API
 *
 * https://highlevel.stoplight.io/docs/integrations/bb6b717cac89c-business-api
 */
interface BusinessContract
{
    /**
     * Update Business
     *
     * @param  array<string>  $params  = []
     * @return array<mixed>|string
     *
     * @link https://highlevel.stoplight.io/docs/integrations/b95210ff2a8d7-update-business
     */
    public function update(string $businessId, array $params = []): array|string;

    /**
     * Delete Business
     *
     * @return array<string>|string
     *
     * @link https://highlevel.stoplight.io/docs/integrations/6f776fbd6dd1f-delete-business
     */
    public function delete(string $businessId): array|string;

    /**
     * Get Business
     *
     * @return array<mixed>|string
     *
     * @link https://highlevel.stoplight.io/docs/integrations/7530dceccc379-get-business
     */
    public function get(string $businessId): array|string;

    /**
     * Get Businesses by Location
     *
     * @return array<mixed>|string
     *
     * @link https://highlevel.stoplight.io/docs/integrations/a8db8afcbe0a3-get-businesses-by-location
     */
    public function getByLocation(string $locationId): array|string;

    /**
     * Create Business
     *
     * @param  array<string>  $params  = []
     * @return array<mixed>|string
     *
     * @link https://highlevel.stoplight.io/docs/integrations/7636876b20ac3-create-business
     */
    public function create(string $name, string $locationId, array $params = []): array|string;
}
