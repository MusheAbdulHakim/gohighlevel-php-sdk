<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Invoices;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\InvoiceContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\ScheduleContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\TemplateContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\Text2payContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Invoice implements InvoiceContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function generateNumber(string $altId, string $altType): array|string
    {
        $params = [];
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::get('invoices/generate-invoice-number', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $invoiceId, array $params = []): array|string
    {
        $payload = Payload::put("invoices/{$invoiceId}/", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $invoiceId, array $params): array|string
    {
        $payload = Payload::put("invoices/{$invoiceId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $invoiceId, string $altId, string $altType): array|string
    {
        $payload = Payload::deleteFromUri("invoices/{$invoiceId}?altId={$altId}&altType={$altType}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function void(string $invoiceId, string $altId, string $altType): array|string
    {
        $params = [];
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $payload = Payload::post("invoices/{$invoiceId}/void/", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $invoiceId, array $params): array|string
    {
        $payload = Payload::post("invoices/{$invoiceId}/send/", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function recordPayment(string $invoiceId, array $params): array|string
    {
        $payload = Payload::post("invoices/{$invoiceId}/record-payment", $params);

        return $this->transporter->requestObject($payload)->data();

    }

    /**
     * {@inheritDoc}
     */
    public function create(array $params): array|string
    {

        $payload = Payload::post('invoices/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $altId, string $altType, string $limit, string $offset, array $params = []): array|string
    {
        $params['altId'] = $altId;
        $params['altType'] = $altType;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $payload = Payload::get('invoices/', $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function template(): TemplateContract
    {
        return new Template($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function schedule(): ScheduleContract
    {
        return new Schedule($this->transporter);
    }

    /**
     * {@inheritDoc}
     */
    public function text2pay(): Text2payContract
    {
        return new Text2pay($this->transporter);
    }
}
