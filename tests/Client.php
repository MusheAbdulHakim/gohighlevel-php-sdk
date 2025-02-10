<?php

use MusheAbdulHakim\GoHighLevel\GoHighLevel;
use MusheAbdulHakim\GoHighLevel\Resources\Business;

test('has businesses', function () {
    $business = GoHighLevel::client('foo')->businesses();
    expect($business)->toBeInstanceOf(Business::class);
});
