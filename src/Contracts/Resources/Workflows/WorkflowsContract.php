<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Workflows;

interface WorkflowsContract
{
    /**
     * Get Workflow
     *
     * @return array<string,number>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/070d2f9be5549-get-workflow
     */
    public function get(string $locationId): array|string;
}
