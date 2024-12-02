<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars;

interface CalendarContract
{
    /**
     * Get free slots for a calendar between a date range. Optionally a consumer can also request free slots in a particular timezone and also for a particular user.
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7f694ee8bd969-get-free-slots
     */
    public function slots(string $calendarId, string $startDate, string $endDate, array $params = []): array|string;

    /**
     * Update calendar by ID.
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cf683b1696d31-update-calendar
     */
    public function update(string $calendarId, array $params = []): array|string;

    /**
     * Get calendar by ID
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/946f5e91e2532-get-calendar
     */
    public function get(string $calendarId): array|string;

    /**
     * Delete Calendar by Id
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/57177f7074647-delete-calendar
     */
    public function delete(string $calendarId): array|string;

    /**
     * Get all calendars in a location.
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e55dec1be7bee-get-calendars
     */
    public function list(string $locationId, array $params = []): array|string;

    /**
     * Create Calendar
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/db6affea7570b-create-calendar
     */
    public function create(string $locationId, string $name, array $params = []): array|string;

    /**
     * Calendar Groups
     */
    public function groups(): GroupContract;

    /**
     * Calendar Events
     */
    public function events(): EventContract;

    /**
     * Calendar Resources
     */
    public function resources(): CalendarResourceContract;
}
