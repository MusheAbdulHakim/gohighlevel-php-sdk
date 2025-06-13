<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Opportunities;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities\FollowerContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities\OpportunityContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Opportunity implements OpportunityContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $id): array|string
    {
        $payload = Payload::get("opportunities/{$id}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $id): array|string
    {
        $payload = Payload::delete('opportunities/', $id);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $id, array $params = []): array|string
    {
        $payload = Payload::put("opportunities/{$id}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function updateStatus(string $id, string $status): array|string
    {
        $params['status'] = $status;
        $payload = Payload::put("opportunities/{$id}/status", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function upsert(string $pipelineId, string $locationId, string $contactId, array $params = []): array|string
    {
        $params['pipelineId'] = $pipelineId;
        $params['locationId'] = $locationId;
        $params['contactId'] = $contactId;
        $payload = Payload::post('opportunities/upsert', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $params = []): array|string
    {
        $payload = Payload::create('opportunities', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $locationId, array $params = []): array|string
    {
        $params['location_id'] = $locationId;
        $payload = Payload::get('opportunities/search', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function pipelines(string $locationId): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('opportunities/pipelines', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function follower(): FollowerContract
    {
        return new Follower($this->transporter);
    }
}
