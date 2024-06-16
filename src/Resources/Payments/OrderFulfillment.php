<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Payments;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\OrderFulfillmentContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class OrderFulfillment implements OrderFulfillmentContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(string $orderId, array $params): array|string
    {
        $payload = Payload::post("payments/orders/{$orderId}/fulfillments", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $orderId, array $params): array|string
    {
        $payload = Payload::get("payments/orders/{$orderId}/fulfillments", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
