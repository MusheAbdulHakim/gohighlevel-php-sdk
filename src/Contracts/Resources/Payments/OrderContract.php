<?php

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments;

interface OrderContract
{
    /**
     * List Orders
     *
     * @see https://highlevel.stoplight.io/docs/integrations/378562f514a17-list-orders
     */
    public function list(string $altId, string $altType, array $params = []): array|string;

    /**
     * Get Order by ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/bcdf47fc22520-get-order-by-id
     */
    public function get(string $orderId, array $params = []): array|string;
}
