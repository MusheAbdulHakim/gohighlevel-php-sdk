<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Locations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\TimezoneContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Timezone implements TimezoneContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId): array|string
    {
        $payload = Payload::get("locations/{$locationId}/timezones");

        return $this->transporter->requestObject($payload)->data();
    }
}
