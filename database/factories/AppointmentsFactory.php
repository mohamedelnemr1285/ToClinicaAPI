<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointments;
use Faker\Generator as Faker;

$factory->define(Appointments::class, function (Faker $faker) {
    return [
        'week_day' => $faker->year,
        'from_hour_to_hour' => $faker->time($format = 'h:i', $min = 'now'),

    ];
});
