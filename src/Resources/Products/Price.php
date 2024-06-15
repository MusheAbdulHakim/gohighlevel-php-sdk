<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Products;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Products\PriceContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Price implements PriceContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function create(string $productId, array $params = []): array|string
    {
        $payload = Payload::create("products/{$productId}/price", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $productId, string $locationId, array $params = []): array|string
    {
        $payload = Payload::get("products/{$productId}/price", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $productId, string $priceId, array $params = []): array|string
    {
        $payload = Payload::get("products/{$productId}/price/{$priceId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $productId, string $priceId, array $params = []): array|string
    {
        $payload = Payload::put("products/{$productId}/price/{$priceId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $productId, string $priceId, array $params = []): array|string
    {
        $payload = Payload::deleteFromUri("products/{$productId}/price/{$priceId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
