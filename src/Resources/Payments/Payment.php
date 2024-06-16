<?php

namespace MusheAbdulHakim\GoHighLevel\Resources\Payments;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\CustomProviderContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\IntegrationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\OrderContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\OrderFulfillmentContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\PaymentContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\SubscriptionContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\TransactionContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;

class Payment implements PaymentContract
{
    use Transportable;

    public function integration(): IntegrationContract
    {
        return new Integration($this->transporter);
    }

    public function order(): OrderContract
    {
        return new Order($this->transporter);
    }

    public function orderFulfillment(): OrderFulfillmentContract
    {
        return new OrderFulfillment($this->transporter);
    }

    public function transaction(): TransactionContract
    {
        return new Transaction($this->transporter);
    }

    public function subscription(): SubscriptionContract
    {
        return new Subscription($this->transporter);
    }

    public function customProvider(): CustomProviderContract
    {
        return new CustomProvider($this->transporter);
    }
}
