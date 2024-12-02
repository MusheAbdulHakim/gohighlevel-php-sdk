<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Snapshots;

interface SnapshotsContract
{
    /**
     * Get Snapshots
     *
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/b7ac59fac1e81-get-snapshots
     */
    public function list(array $params = []): array|string;

    /**
     * Create Snapshot Share Link
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7cfd7fa37e660-create-snapshot-share-link
     */
    public function create(string $companyId, array $params = []): array|string;

    /**
     * Get Snapshot Push between Dates
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/3aafd3250cc4d-get-snapshot-push-between-dates
     */
    public function between(string $snapshotId, string $from, string $to, array $params = []): array|string;

    /**
     * Get Last Snapshot Push
     *
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/6c45f1aad5098-get-last-snapshot-push
     */
    public function get(string $snapshotId, string $locationId, array $params = []): array|string;
}
