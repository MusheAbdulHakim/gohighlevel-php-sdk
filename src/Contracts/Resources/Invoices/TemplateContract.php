<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices;

interface TemplateContract
{
    /**
     * Create Template
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7cc0fad9bc3c0-create-template
     */
    public function create(array $params): array|string;

    /**
     * List Templates
     *
     *
     * @param  array<mixed>  $params
     *
     * @see https://highlevel.stoplight.io/docs/integrations/2840a2faefb4f-list-templates
     */
    public function list(string $altId, string $altType, string $limit, string $offset, array $params = []): array|string;

    /**
     * Get a tempalte
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/3bacd8c4310d2-get-an-template
     */
    public function get(string $templateId, array $params = []): array|string;

    /**
     * Update template
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7467126c48049-update-template
     */
    public function update(string $templateId, array $params = []): array|string;

    /**
     * Delete Template
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/caaab6a02e9ad-delete-template
     */
    public function delete(string $templateId): array|string;
}
