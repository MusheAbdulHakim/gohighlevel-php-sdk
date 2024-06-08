<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Calendars;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars\GroupContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Group implements GroupContract
{
    use Transportable;

    public function get(string $locationId): array|string
    {
        $payload = Payload::get('calendars/groups', [
            'locationId' => $locationId,
        ]);

        return $this->transporter->requestObject($payload)->get('groups');
    }

    public function create(array $params): array|string
    {
        $payload = Payload::create('calendars/groups', $params);

        return $this->transporter->requestObject($payload)->get('group');
    }

    public function validate(string $locationId, string $slug, bool $available): array|string
    {
        $params['locationId'] = $locationId;
        $params['slug'] = $slug;
        $params['available'] = $available;
        $payload = Payload::put('calendars/groups/validate-slug', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function delete(string $groupId): array|string
    {
        $payload = Payload::delete('calendars/groups', $groupId);

        return $this->transporter->requestObject($payload)->data();
    }

    public function update(string $groupId, array $params = []): array|string
    {
        $payload = Payload::put("calendars/groups/{$groupId}", $params);

        return $this->transporter->requestObject($payload)->get('group');
    }

    public function disable(string $groupId, bool $isActive): array|string
    {
        $params['isActive'] = $isActive;
        $payload = Payload::put("calendars/groups/{$groupId}/status", $params);

        return $this->transporter->requestObject($payload)->get('group');
    }
}
