<?php
declare(strict_types=1);
namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations;

interface CustomFieldContract
{
    /**
     * Get Custom Fields
     * @param string $locationId
     * @return array<string,int>|string
     * @see https://highlevel.stoplight.io/docs/integrations/791462a3367b9-get-custom-fields
     */
    public function list(string $locationId): array|string;


    /**
     * Create Custom Field
     * @param string $locationId
     * @param string $name
     * @param string $dataType
     * @param array<array,string> $params
     * @return array<string,int>|string
     * @see https://highlevel.stoplight.io/docs/integrations/7b2584aa2450c-create-custom-field
     */
    public function create(string $locationId, string $name, string $dataType, array $params): array|string;

    /**
     * Get Custom Field
     * @param string $locationId
     * @param string $id
     * @return array<string,int>|string
     * @see https://highlevel.stoplight.io/docs/integrations/394d117ca4332-get-custom-field
     */
    public function get(string $locationId, string $id): array|string;

    /**
     * Update Custom Field
     * @param string $locationId
     * @param string $id
     * @param array<string,int> $params
     * @return array<string,int>|string
     * @see https://highlevel.stoplight.io/docs/integrations/a96e05f71bdf4-update-custom-field
     */
    public function update(string $locationId, string $id, array $params): array|string;

    /**
     * Delete Custom Field
     * @param string $locationId
     * @param string $id
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/ca83b24e1ca24-delete-custom-field
     */
    public function delete(string $locationId, string $id): array|string;

    /**
     * Uploads File to customFields
     * @param string $locationId
     * @param array $params
     * @return array|string
     * @see https://highlevel.stoplight.io/docs/integrations/67af3120b5137-uploads-file-to-custom-fields
     */
    public function upload(string $locationId, array $params): array|string;
}
