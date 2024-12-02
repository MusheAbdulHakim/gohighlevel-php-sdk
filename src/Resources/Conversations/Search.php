<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Conversations;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\SearchContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Search implements SearchContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function make(string $locationId, $parameters = []): array|string
    {
        $parameters['locationId'] = $locationId;
        $payload = Payload::get('conversations/search', $parameters);

        return $this->transporter->requestObject($payload)->data();
    }
}
