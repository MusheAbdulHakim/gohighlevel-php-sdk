<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Workflows;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Workflows\WorkflowsContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Workflow implements WorkflowsContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function get(string $locationId): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('workflows/', $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
