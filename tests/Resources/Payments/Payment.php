<?php

use MusheAbdulHakim\GoHighLevel\Resources\Payments\Payment;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\Integration;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\Order;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\OrderFulfillment;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\Transaction;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\Subscription;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\CustomProvider;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->payment = new Payment($this->transporter);
});

it('can get sub-resources', function () {
    expect($this->payment->integration())->toBeInstanceOf(Integration::class);
    expect($this->payment->order())->toBeInstanceOf(Order::class);
    expect($this->payment->orderFulfillment())->toBeInstanceOf(OrderFulfillment::class);
    expect($this->payment->transaction())->toBeInstanceOf(Transaction::class);
    expect($this->payment->subscription())->toBeInstanceOf(Subscription::class);
    expect($this->payment->customProvider())->toBeInstanceOf(CustomProvider::class);
});
