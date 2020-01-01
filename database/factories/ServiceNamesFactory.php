<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceNames;
use Faker\Generator as Faker;

$factory->define(ServiceNames::class, function (Faker $faker) {
    return [
        'name' => $faker->name,

    ];
});
