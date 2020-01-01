<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discount;
use Faker\Generator as Faker;

$factory->define(Discount::class, function (Faker $faker) {
    return [
        'link' => $faker->domainName,
        'percentage' => mt_rand(1,100),
        'duration' =>mt_rand(1,100),
        'discount_code' => mt_rand(1,100),
        'discounted_type' => $faker->name,
        'discounted_id' =>mt_rand(1,100),

    ];
});
