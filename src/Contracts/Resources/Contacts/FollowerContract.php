<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface FollowerContract
{
    /**
     * Add Followers
     *
     *
     * @param  array<string>  $followers
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d6499bc9a04e7-add-followers
     */
    public function add(string $contactId, array $followers): array|string;

    /**
     * Add Followers
     *
     * @param  array<string>  $followers
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/d6499bc9a04e7-add-followers
     */
    public function create(string $contactId, array $followers): array|string;

    /**
     * Remove Followers
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/6c2659991d43c-remove-followers
     */
    public function delete(string $contactId): array|string;
}
