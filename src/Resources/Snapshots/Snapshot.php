<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Snapshots;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Snapshots\SnapshotsContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Snapshot implements SnapshotsContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(array $params = []): array|string
    {
        $payload = Payload::get('snapshots/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $companyId, array $params = []): array|string
    {
        $params['companyId'] = $companyId;
        $payload = Payload::create('snapshots/share/link', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function between(string $snapshotId, string $from, string $to, array $params = []): array|string
    {
        $params['from'] = $from;
        $params['to'] = $to;
        $payload = Payload::get("snapshots/snapshot-status/{$snapshotId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $snapshotId, string $locationId, array $params = []): array|string
    {
        $payload = Payload::get("snapshots/snapshot-status/{$snapshotId}/location/{$locationId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
