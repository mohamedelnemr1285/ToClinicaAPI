<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'status' =>$faker-> randomElement(['active','completed']),
        'appointment' => $faker->phoneNumber,
        'price' =>$faker->numberBetween(1,100),
        'discounted_price' => $faker->numberBetween(1,100),
        'service_id' => $faker->numberBetween(1,100),
        'discount_id' => $faker->numberBetween(1,100),
        'patient_id' => $faker->numberBetween(1,100),
    ];
});
