<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Locations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\CustomFieldContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\CustomValueContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\LocationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\SearchContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\TagContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\TemplateContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\TimezoneContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Location implements LocationContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $payload = Payload::create('locations/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $locationId): array|string
    {
        $payload = Payload::get("locations/{$locationId}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $locationId, array $params = []): array|string
    {
        $payload = Payload::put("locations/{$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $locationId, array $params = []): array|string
    {
        $payload = Payload::delete('locations', $locationId);

        return $this->transporter->requestObject($payload)->data();
    }

    public function tag(): TagContract
    {
        return new Tag($this->transporter);
    }

    public function customField(): CustomFieldContract
    {
        return new CustomField($this->transporter);
    }

    public function customValue(): CustomValueContract
    {
        return new CustomValue($this->transporter);
    }

    public function template(): TemplateContract
    {
        return new Template($this->transporter);
    }

    public function search(): SearchContract
    {
        return new Search($this->transporter);
    }

    public function timezone(): TimezoneContract
    {
        return new Timezone($this->transporter);
    }
}
