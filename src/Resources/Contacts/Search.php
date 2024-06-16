<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\SearchContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Search implements SearchContract
{
    use Transportable;

    public function getDuplicate(string $locationId, $parameters = []): void
    {
        $parameters['locationId'] = $locationId;
        Payload::get('contacts/search/duplicate', $parameters);
    }
}
