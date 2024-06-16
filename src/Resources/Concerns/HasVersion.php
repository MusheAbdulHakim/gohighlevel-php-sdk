<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Concerns;

use DateTime;
use MusheAbdulHakim\GoHighLevel\Exceptions\InvalidArgumentException;

trait HasVersion
{
    /**
     * The API Version.
     */
    private ?string $apiVersion = null;

    public function setVersion(?string $apiVersion): self
    {
        if (DateTime::createFromFormat('Y-m-d', $apiVersion) !== false) {
            $this->apiVersion = trim((string) $apiVersion);

            return $this;
        }
        throw new InvalidArgumentException('Api Version Date is not formated well. use Y-m-d format');
    }
}
