<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Funnels;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels\FunnelContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels\RedirectContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Funnel implements FunnelContract
{
    use Transportable;

    public function list(string $locationId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $payload = Payload::get('funnels/funnel/list/', $params);

        return $this->transporter->requestObject($payload)->get('funnels');
    }

    public function pages(string $funnelId, string $locationId, int $limit, int $offset, array $params = []): array|string
    {
        $params['funnelId'] = $funnelId;
        $params['locationId'] = $locationId;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $payload = Payload::get('funnels/page', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function redirect(): RedirectContract
    {
        return new Redirect($this->transporter);
    }
}
