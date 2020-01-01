<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advertisement;
use Faker\Generator as Faker;

$factory->define(Advertisement::class, function (Faker $faker) {
    return [
        'image' => $faker->word,
        'duration' => $faker->numberBetween(1,100),
        'discount_id' =>mt_rand(1,100),
        'clinic_id' => $faker->numberBetween(1,100),
    ];
});
