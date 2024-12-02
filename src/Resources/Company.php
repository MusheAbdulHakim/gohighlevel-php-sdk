<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Company implements CompanyContract
{
    use Concerns\Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $companyId): array|string
    {
        $payload = Payload::get("companies/{$companyId}");

        return $this->transporter->requestObject($payload)->data();
    }
}
