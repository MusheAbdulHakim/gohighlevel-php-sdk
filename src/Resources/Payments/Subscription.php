<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Payments;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\SubscriptionContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Subscription implements SubscriptionContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $altId, string $altType, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::get('payments/subscriptions', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $subscriptionId, string $altId, string $altType, array $params = []): array|string
    {
        $params['subscriptionId'] = $subscriptionId;
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::get("payments/subscriptions/{$subscriptionId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
