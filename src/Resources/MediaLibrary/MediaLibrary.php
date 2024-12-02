<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\MediaLibrary;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\MediaLibrary\MediaLibraryContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class MediaLibrary implements MediaLibraryContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function delete(string $id, string $altId, string $altType): array|string
    {
        $payload = Payload::deleteFromUri("medias/{$id}?altType={$altType}&altId={$altId}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function upload(array $params): array|string
    {
        $payload = Payload::post('medias/upload-file', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $altId, string $altType, string $sortBy, string $sortOrder, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $params['sortBy'] = $sortBy;
        $params['sortOrder'] = $sortOrder;
        $payload = Payload::get('medias/files', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
