<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations;

interface TemplateContract
{
    /**
     * GET all or email/sms templates
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/2d66d23600a8b-get-all-or-email-sms-templates
     */
    public function list(string $locationId, string $originId, array $params = []): array|string;

    /**
     * DELETE an email/sms template
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/cdce8f8899efe-delete-an-email-sms-template
     */
    public function delete(string $locationId, string $id): array|string;
}
