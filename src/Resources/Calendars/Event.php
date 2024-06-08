<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Calendars;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars\EventContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Event implements EventContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $endTime, string $startTime, string $locationId, string $calendarId, array $params = []): array|string
    {
        $params['endtime'] = $endTime;
        $params['startTime'] = $startTime;
        $params['locationId'] = $locationId;
        $params['calendarId'] = $calendarId;
        $payload = Payload::get('calendars/events', $params);

        return $this->transporter->requestObject($payload)->get('events');
    }

    /**
     * {@inheritDoc}
     */
    public function slots(string $endTime, string $locationId, string $startTime, string $calendarId, array $params = []): array|string
    {
        $params['endtime'] = $endTime;
        $params['startTime'] = $startTime;
        $params['locationId'] = $locationId;
        $params['calendarId'] = $calendarId;
        $payload = Payload::get('calendars/blocked-slots', $params);

        return $this->transporter->requestObject($payload)->get('events');
    }

    /**
     * {@inheritDoc}
     */
    public function getAppointment(string $eventId): array|string
    {
        $payload = Payload::get("calendars/events/appointments/{$eventId}");

        return $this->transporter->requestObject($payload)->get('event');
    }

    /**
     * {@inheritDoc}
     */
    public function ediAppointment(string $eventId, array $params = []): array|string
    {
        $payload = Payload::put("calendars/events/appointments/{$eventId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function createAppointment(string $calendarId, string $locationId, string $contactId, string $startTime, array $params): array|string
    {
        $params['calendarId'] = $calendarId;
        $params['locationId'] = $locationId;
        $params['contactId'] = $contactId;
        $params['startTime'] = $startTime;
        $payload = Payload::create('calendars/events/appointments', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function createSlot(string $locationId, string $startTime, string $endTime, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $params['startTime'] = $startTime;
        $params['endTime'] = $endTime;
        $payload = Payload::create('calendars/events/block-slots', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function editSlot(string $eventId, array $params = []): array|string
    {
        $payload = Payload::put("calendars/events/block-slots/{$eventId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $eventId): array|string
    {
        $payload = Payload::delete('calendars/events', $eventId);

        return $this->transporter->requestObject($payload)->data();
    }
}
