<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Courses;

interface CourseContract
{
    /**
     * GetImport Courses through public channels
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7ca9bb420fe98-import-courses
     */
    public function import(string $locationId, string $userId, array $products): array|string;
}
