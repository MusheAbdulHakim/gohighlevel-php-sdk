<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Payments;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\TransactionContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Transaction implements TransactionContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $altId, string $altType, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::get('payments/transactions', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $transactionId, string $altId, string $altType, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::get("payments/transactions/{$transactionId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
