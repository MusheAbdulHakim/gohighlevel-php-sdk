<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\MediaLibrary;

interface MediaLibraryContract
{
    /**
     * Get List of Files
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/0a4bf8cac58a9-get-list-of-files
     */
    public function list(string $altId, string $altType, string $sortBy, string $sortOrder, array $params = []): array|string;

    /**
     * Upload File into Media Library
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/f737851451054-upload-file-into-media-library
     */
    public function upload(array $params): array|string;

    /**
     * Delete File or Folder
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/fb48a2a324010-delete-file-or-folder
     */
    public function delete(string $id, string $altId, string $altType): array|string;
}
