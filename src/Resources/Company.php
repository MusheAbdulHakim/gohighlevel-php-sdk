<?php
declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources;

use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;

final class Company implements CompanyContract
{
    use Concerns\Transportable;
    // use Concerns\HasVersion;

    // public function __construct($apiVersion)
    // {
    //     $this->setVersion($apiVersion);
    // }

    public function get(string $companyId)
    {
        $payload = Payload::get("companies/{$companyId}");

        return $this->transporter->requestObject($payload);
    }
}
