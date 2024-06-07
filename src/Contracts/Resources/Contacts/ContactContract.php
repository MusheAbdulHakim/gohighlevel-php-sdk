<?php
declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface ContactContract {

    public function get(string $contactId);

    public function update(string $contactId, array $params);

    public function delete(string $contactId);

    public function upsert(array $params);

    public function byBusiness(string $businessId);

    public function create(array $params);

    public function list(string $locationId);

}
