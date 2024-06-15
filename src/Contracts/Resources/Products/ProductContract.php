<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Products;

/**
 * @see https://highlevel.stoplight.io/docs/integrations/486b7c90818f4-products-api
 */
interface ProductContract
{
    /**
     * Get Product by ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/272e8f008adb0-get-product-by-id
     */
    public function get(string $productId, array $params = []): array|string;

    /**
     * Delete Product by ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/285e8c049b2e1-delete-product-by-id
     */
    public function delete(string $productId, array $params = []): array|string;

    /**
     * Update Product by ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/469d7a90e0d15-update-product-by-id
     */
    public function update(string $productId, array $params = []): array|string;

    /**
     * Create Product
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9eda2dc176c9c-create-product
     */
    public function create(array $params = []): array|string;

    /**
     * List Products
     *
     * @param  array  $params  = []
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7f6ce42d09400-list-products
     */
    public function list(string $locationId, array $params = []): array|string;

    public function price(): PriceContract;
}
