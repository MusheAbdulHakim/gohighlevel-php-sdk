<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\CustomMenus;

interface CustomMenuContract
{
    /**
     * Get Custom Menu
     * @param string $customMenuId
     * @return array|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/61dd579c0eb32-get-custom-menu-link
     */
    public function get(string $customMenuId): array|string;

    /**
     * Update Custom Menu
     *
     * @param string $customMenuId
     * @param array $params
     * @return array|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/5117e328cff1d-update-custom-menu-link
     */
    public function update(string $customMenuId, array $params): array|string;

    /**
     * Delete Custom Menu
     *
     * @param string $customMenuId
     * @return array|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/8df5e4d2d798e-delete-custom-menu-link
     */
    public function delete(string $customMenuId): array|string;

    /**
     * Create Custom Menu
     *
     *
     * @param  array  $params
     * @return array|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/74c33112ec16f-create-custom-menu-link
     */
    public function create(array $params): array|string;

    /**
     * Get Custom Menus
     *
     * @param string $locationId
     * @return array|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/5a61f2f673169-get-custom-menu-links
     */
    public function list(string $locationId): array|string;
}
