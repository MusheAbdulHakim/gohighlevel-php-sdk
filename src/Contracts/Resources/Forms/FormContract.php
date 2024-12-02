<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Forms;

/**
 * Forms Api
 *
 * @see https://highlevel.stoplight.io/docs/integrations/0af2368376eb2-forms-api
 */
interface FormContract
{
    /**
     * Get Forms Submissions
     *
     * @param  array<string,number>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/a6114bd7685d1-get-forms-submissions
     */
    public function submissions(string $locationId, array $params = []): array|string;

    /**
     * Upload files to custom fields
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/p74kog0xqugo8-upload-files-to-custom-fields
     */
    public function uploadToCustomFields(string $locationId, string $contactId): array|string;

    /**
     * Get Forms
     *
     * @param  array<string,number>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/49e29c1716c61-get-forms
     */
    public function list(string $locationId, array $params = []): array|string;
}
