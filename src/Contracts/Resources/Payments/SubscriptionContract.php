<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments;

interface SubscriptionContract
{
    /**
     * List Subscriptions
     *
     * @see https://highlevel.stoplight.io/docs/integrations/33c965c6cb9da-list-subscriptions
     */
    public function list(string $altId, string $altType, array $params = []): array|string;

    /**
     * Get Subscription by ID
     *
     * @see https://highlevel.stoplight.io/docs/integrations/7be164894d54e-get-subscription-by-id
     */
    public function get(string $subscriptionId, string $altId, string $altType, array $params = []): array|string;
}
