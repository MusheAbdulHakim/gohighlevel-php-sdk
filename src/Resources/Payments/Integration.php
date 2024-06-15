<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Payments;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\IntegrationContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Integration implements IntegrationContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $payload = Payload::create('payments/integrations/provider/whitelabel', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $altId, string $altType, array $params = []): array|string
    {
        $payload = Payload::get('payments/integrations/provider/whitelabel', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
