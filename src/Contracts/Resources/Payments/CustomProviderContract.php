<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments;

interface CustomProviderContract
{
    /**
     *Create new integration
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d3e2affc0897a-create-new-integration
     */
    public function create(string $locationId, array $params = []): array|string;

    /**
     *Deleting an existing integration
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/97fffb0398f3c-deleting-an-existing-integration
     */
    public function delete(string $locationId): array|string;

    /**
     * Fetch given provider config
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/dec209bac6191-fetch-given-provider-config
     */
    public function getConfig(string $locationId): array|string;

    /**
     * Create new provider config
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/377c9e577827b-create-new-provider-config
     */
    public function createConfig(string $locationId, array $params): array|string;

    /**
     * Delete existing provider config
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d9151fabd2d1a-delete-existing-provider-config
     */
    public function deleteConfig(string $locationId, bool $liveMode): array|string;

    /**
     * Disconnect existing provider config
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d9151fabd2d1a-disconnect-existing-provider-config
     */
    public function disconnectConfig(string $locationId, bool $liveMode): array|string;
}
