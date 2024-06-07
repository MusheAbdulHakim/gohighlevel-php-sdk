<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface TagContract
{
    /**
     * Add Tags
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/c9bbad7cdacf5-add-tags
     */
    public function create(string $contactId, array|string $tags);

    /**
     * Remove Tags
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e5d269b7415bf-remove-tags
     */
    public function remove(string $contactId);
}
