<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Invoices;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\ScheduleContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Schedule implements ScheduleContract
{
    use Transportable;

    public function create(array $params): array|string
    {
        $payload = Payload::post('invoices/schedule/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function list(string $altId, string $altType, string $limit, string $offset, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $payload = Payload::get('invoices/schedule/', $params);

        return $this->transporter->requestObject($payload)->data();

    }

    public function get(string $scheduleId, string $altId, string $altType): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::get("invoices/schedule/{$scheduleId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function update(string $scheduleId, string $altId, string $altType, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::put("invoices/schedule/{$scheduleId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function delete(string $scheduleId, string $altId, string $altType): array|string
    {
        $payload = Payload::deleteFromUri("invoices/schedule/{$scheduleId}?altId={$altId}&altType={$altType}");

        return $this->transporter->requestObject($payload)->data();
    }

    public function invoice(string $scheduleId, string $altId, string $altType, array $params): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::post("invoices/schedule/{$scheduleId}/schedule", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function autoPayment(string $scheduleId, string $altId, string $altType, array $params): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::post("invoices/schedule/{$scheduleId}/auto-payment", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    public function cancel(string $scheduleId, string $altId, string $altType): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::post("invoices/schedule/{$scheduleId}/cancel", $params);

        return $this->transporter->requestObject($payload)->data();

    }
}
