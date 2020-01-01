<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [

        'service_name_id' => $faker->word,
        'details' => $faker->word,
        'price' =>mt_rand(1,100),
        'price_subtract' => mt_rand(1,100),
        'doctor_id' => mt_rand(1,100),
    ];
});
