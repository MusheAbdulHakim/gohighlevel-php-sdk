<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Auth;

/**
 * @see https://highlevel.stoplight.io/docs/integrations/889f37581bd0e-o-auth-2-0
 */
interface OAuthContract
{
    /**
     * Get Access Token
     *
     * @see https://highlevel.stoplight.io/docs/integrations/00d0c0ecaa369-get-access-token
     */
    public function get(string $client_id, string $client_secret, string $grant_type, array $params = []);

    /**
     * Get Location Access Token from Agency Token
     *
     * @see https://highlevel.stoplight.io/docs/integrations/1a30b217da571-get-location-access-token-from-agency-token
     */
    public function AcessFromAgency(string $companyId, string $locationId): array|string;

    /**
     * Get Location where app is installed
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/aeed19d08490e-get-location-where-app-is-installed
     */
    public function appLocation(string $appId, string $companyId, array $params = []): array|string;

    /**
     * Get Location where app is installed
     *
     * @see https://highlevel.stoplight.io/docs/integrations/aeed19d08490e-get-location-where-app-is-installed
     */
    public function location(string $appId, string $companyId, array $params = []): array|string;
}
