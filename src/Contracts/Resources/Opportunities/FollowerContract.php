<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities;

interface FollowerContract
{
    /**
     * Add Followers
     *
     * @param  array<string>  $followers
     * @return array<string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/a4853ad9d0a48-add-followers
     */
    public function add(string $id, array $followers): array|string;

    /**
     * Delete Followers
     *
     * @return array<string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/0412c261ca64b-remove-followers
     */
    public function remove(string $id): array|string;

    /**
     * Delete Followers
     *
     * @return array<string>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/0412c261ca64b-remove-followers
     */
    public function delete(string $id): array|string;
}
