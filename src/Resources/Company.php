<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Company implements CompanyContract
{
    use Concerns\Transportable;

    public function get(string $companyId): \MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response
    {
        $payload = Payload::get("companies/{$companyId}");

        return $this->transporter->requestObject($payload);
    }
}
