<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface TagContract
{
    /**
     * Add Tags
     *
     * @param  array<string>|string  $tags
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/c9bbad7cdacf5-add-tags
     */
    public function create(string $contactId, array|string $tags): array|string;

    /**
     * Remove Tags
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e5d269b7415bf-remove-tags
     */
    public function remove(string $contactId): array|string;
}
