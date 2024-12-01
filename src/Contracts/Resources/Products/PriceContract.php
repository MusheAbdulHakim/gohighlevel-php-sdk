<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Products;

interface PriceContract
{
    /**
     * Create Price for a Product
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/a47cd944aede9-create-price-for-a-product
     */
    public function create(string $productId, array $params = []): array|string;

    /**
     * List Prices for a Product
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/4f8b3c58c2e81-list-prices-for-a-product
     */
    public function list(string $productId, string $locationId, array $params = []): array|string;

    /**
     * Get Price by ID for a Product
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/f902955da364a-get-price-by-id-for-a-product
     */
    public function get(string $productId, string $priceId, array $params = []): array|string;

    /**
     * Update Price by ID for a Product
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7ffcf47b1687a-update-price-by-id-for-a-product
     */
    public function update(string $productId, string $priceId, array $params = []): array|string;

    /**
     * Delete Price by ID for a Product
     *
     *
     * @param  array<string>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/6025f28b731c1-delete-price-by-id-for-a-product
     */
    public function delete(string $productId, string $priceId, array $params = []): array|string;
}
