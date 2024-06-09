<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices;

interface Text2payContract
{
    /**
     * Create & Send
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e739c3a249591-create-and-send
     */
    public function create(array $params): array|string;

    /**
     * Update & Send
     */
    public function update(string $id, array $params): array|string;
}
