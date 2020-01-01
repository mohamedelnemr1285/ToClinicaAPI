<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking_item;
use Faker\Generator as Faker;

$factory->define(Booking_item::class, function (Faker $faker) {
    return [
        'service_id' => mt_rand(1,10),
        'booking_id' => mt_rand(1,10),

    ];
});
