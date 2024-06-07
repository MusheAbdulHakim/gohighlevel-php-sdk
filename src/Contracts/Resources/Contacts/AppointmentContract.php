<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface AppointmentContract
{
    /**
     * Get Appointments for Contact
     *
     * @see https://highlevel.stoplight.io/docs/integrations/6015cf49a7ae8-get-appointments-for-contact
     */
    public function contacts(string $contactId);
}
