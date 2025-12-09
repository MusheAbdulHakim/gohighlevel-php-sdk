<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Forms;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Forms\FormContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Form implements FormContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function submissions(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('forms/submissions', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function uploadToCustomFields(string $locationId, string $contactId): array|string
    {
        $params = [];
        $params['locationId'] = $locationId;
        $params['contactId'] = $contactId;
        $payload = Payload::post("forms/upload-custom-files?contactId=$contactId&locationId=$locationId");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId, array $params = []): array|string
    {
        $payload = Payload::get("forms/?locationId=$locationId", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
