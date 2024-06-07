<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources;

interface BusinessContract
{
    public function update(string $businessId, array $params);

    public function delete(string $businessId);

    public function get(string $businessId);

    public function getByLocation(string $locationId);

    public function create(string $name, string $locationId, array $params);
}
