<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\AppointmentContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\CampaignContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\ContactContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\FollowerContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\NoteContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\SearchContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\TagContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\TaskContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\WorkflowContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Contact implements ContactContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $contactId): string|array
    {
        $payload = Payload::get("contacts/{$contactId}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $contactId, array $params): string|array
    {
        $payload = Payload::put("contacts/{$contactId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $contactId): array|string
    {
        $payload = Payload::delete('contacts/', $contactId);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function upsert(array $params): array|string
    {
        $payload = Payload::create('contacts/upsert', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function byBusiness(string $businessId): string|array
    {
        $payload = Payload::get('contacts/business/businessId', [
            'locationId' => $businessId,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {
        $payload = Payload::create('contacts/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $locationId): string|array
    {
        $payload = Payload::get('contacts/', [
            'locationId' => $locationId,
        ]);

        return $this->transporter
            ->requestObject($payload)
            ->data();
    }

    /**
     * {@inheritDoc}
     */
    public function tasks(): TaskContract
    {
        return new Task($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function appointments(): AppointmentContract
    {
        return new Appointment($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function tags(): TagContract
    {
        return new Tag($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function notes(): NoteContract
    {
        return new Note($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function campaign(): CampaignContract
    {
        return new Campaign($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function workflow(): WorkflowContract
    {
        return new Workflow($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function bulk(string $locationId, array $ids, string $businessId): array
    {
        return (new Bulk($this->transporter))->addOrRemove($locationId, $ids, $businessId);
    }

    /**
     * {@inheritDoc}
     */
    public function search(): SearchContract
    {
        return new Search($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function followers(): FollowerContract
    {
        return new Follower($this->transporter);
    }
}
