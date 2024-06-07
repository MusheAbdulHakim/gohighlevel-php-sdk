<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\AppointmentContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Appointment implements AppointmentContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function contacts(string $contactId)
    {
        $payload = Payload::get("contacts/{$contactId}/appointments");

        return $this->transporter->requestObject($payload)->get('events');

    }
}
