<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Invoices;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\Text2payContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Text2pay implements Text2payContract
{
    use Transportable;

    public function create(array $params): array|string
    {
        $payload = Payload::post('invoices/text2pay/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function update(string $id, array $params): array|string
    {
        $payload = Payload::post("invoices/text2pay/{$id}/", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
