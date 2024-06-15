<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\SaaS;

/**
 * @see https://highlevel.stoplight.io/docs/integrations/5e0404456de81-saa-s-api
 */
interface SaasContract
{
    /**
     * Get locations by stripeId with companyId
     *
     * @see https://highlevel.stoplight.io/docs/integrations/17e63a64621dc-get-locations-by-stripe-id-with-company-id
     */
    public function get(array $params = []): array|string;

    /**
     * Update SaaS subscription
     *
     * @see https://highlevel.stoplight.io/docs/integrations/3ed6984d6d3d3-update-saa-s-subscription
     */
    public function update(string $locationId, array $params = []): array|string;

    /**
     * Disable SaaS for locations
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ae2bab1a54b4b-disable-saa-s-for-locations
     */
    public function disable(string $companyId, array $params = []): array|string;

    /**
     * Enable SaaS for location
     *
     * @see https://highlevel.stoplight.io/docs/integrations/b7ee10fc892a5-enable-saa-s-for-location
     */
    public function enable(string $locationId, array $params = []): array|string;

    /**
     * Pause location
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7ad2b7afa2a8c-pause-location
     */
    public function pause(string $locationId, array $params = []): array|string;

    /**
     * Update Rebilling
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cad43318bd5dc-update-rebilling
     */
    public function updateRebilling(string $companyId, array $params = []): array|string;
}
