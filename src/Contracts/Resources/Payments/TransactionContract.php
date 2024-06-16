<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments;

interface TransactionContract
{
    /**
     * List Transactions
     *
     * @see https://highlevel.stoplight.io/docs/integrations/4d127e6508f0a-list-transactions
     */
    public function list(string $altId, string $altType, array $params = []): array|string;

    /**
     * Get Transaction by ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/722e5769feada-get-transaction-by-id
     */
    public function get(string $transactionId, string $altId, string $altType, array $params = []): array|string;
}
