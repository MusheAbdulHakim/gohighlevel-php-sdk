<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\SearchContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Search implements SearchContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function query(array $params): array|string
    {
        $payload = Payload::post('contacts/search/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function getDuplicate(string $locationId, $parameters = []): array|string
    {
        $parameters['locationId'] = $locationId;
        $payload = Payload::get('contacts/search/duplicate', $parameters);

        return $this->transporter->requestObject($payload)->data();
    }
}
