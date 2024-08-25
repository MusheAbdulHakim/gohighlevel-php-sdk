<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Courses;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Courses\CourseContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Course implements CourseContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function import(string $locationId, string $userId, array $products): array|string
    {
        $params['locationId'] = $locationId;
        $params['userId'] = $userId;
        $params['products'] = $products;
        $payload = Payload::create('courses/courses-exporter/public/import', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
