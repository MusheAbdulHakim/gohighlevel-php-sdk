<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments;

interface OrderContract
{
    /**
     * List Orders
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/378562f514a17-list-orders
     */
    public function list(string $altId, string $altType, array $params = []): array|string;

    /**
     * Get Order by ID
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/bcdf47fc22520-get-order-by-id
     */
    public function get(string $orderId, array $params = []): array|string;
}
