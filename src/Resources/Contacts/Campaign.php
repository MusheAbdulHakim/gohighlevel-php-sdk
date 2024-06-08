<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\CampaignContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Campaign implements CampaignContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(string $contactId, string $campaignId)
    {
        $payload = Payload::modify("contacts/{$contactId}/campaigns/", $campaignId);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function add(string $contactId, string $campaignId)
    {
        $payload = Payload::modify("contacts/{$contactId}/campaigns/", $campaignId);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function removeContact(string $contactId, string $campaignId)
    {
        $payload = Payload::deleteFromUri("contacts/{$contactId}/campaigns/{$campaignId}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function removeContactFromAll(string $contactId)
    {
        $payload = Payload::deleteFromUri("contacts/{$contactId}/campaigns/removeAll");

        return $this->transporter->requestObject($payload)->data();
    }
}
