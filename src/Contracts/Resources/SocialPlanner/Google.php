<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\SocialPlanner;

interface Google
{
    /**
     * Starts OAuth For Google Account
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/dbfd97ae4579e-starts-o-auth-for-google-account
     */
    public function oAuth(string $locationId, string $userId, array $params = []): array|string;

    /**
     * Get google business locations
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9708df0eb6fc4-get-google-business-locations
     */
    public function businessLocations(string $accountId, string $locationId): array|string;

    /**
     * Set google business locations
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/4f041ce5f80d0-set-google-business-locations
     */
    public function setBusinessLocation(string $accountId, string $locationId, array $params = []): array|string;
}
