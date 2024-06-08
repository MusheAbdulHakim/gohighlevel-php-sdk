<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Forms;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Forms\FormContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Form implements FormContract
{
    use Transportable;

    public function submissions(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('forms/submissions', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function uploadToCustomFields(string $locationId, string $contactId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $params['contactId'] = $contactId;
        $payload = Payload::upload('forms/upload-custom-files/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function list(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('forms/', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
