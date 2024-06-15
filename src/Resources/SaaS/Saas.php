<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\SaaS;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\SaaS\SaasContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Saas implements SaasContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(array $params = []): array|string
    {
        $payload = Payload::get('saas-api/public-api/locations', $params);
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $locationId, array $params = []): array|string
    {
        $payload = Payload::put("saas-api/public-api/update-saas-subscription/{$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function disable(string $companyId, array $params = []): array|string
    {
        $payload = Payload::post("saas-api/public-api/bulk-disable-saas/{$companyId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function enable(string $locationId, array $params = []): array|string
    {
        $payload = Payload::post("saas-api/public-api/enable-saas/{$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function pause(string $locationId, array $params = []): array|string
    {
        $payload = Payload::post("saas-api/public-api/pause/{$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function updateRebilling(string $companyId, array $params = []): array|string
    {
        $payload = Payload::post("saas-api/public-api/update-rebilling/{$companyId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
