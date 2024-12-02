<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources;

interface CompanyContract
{
    /**
     * Get a company
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cc7b8a7892119-get-company
     */
    public function get(string $companyId): array|string;
}
