<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments;

interface IntegrationContract
{
    /**
     * Create White-label Integration Provider
     *
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/38fc7b49d107d-create-white-label-integration-provider
     */
    public function create(array $params): array|string;

    /**
     * List White-label Integration Providers
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cbdced5c59dfd-list-white-label-integration-providers
     */
    public function list(string $altId, string $altType, array $params = []): array|string;
}
