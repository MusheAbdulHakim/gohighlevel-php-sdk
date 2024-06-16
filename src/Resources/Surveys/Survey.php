<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Surveys;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Surveys\SurveysContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Survey implements SurveysContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function submissions(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('surveys/submissions', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('surveys/', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
