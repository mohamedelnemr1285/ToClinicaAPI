<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\type_of_specialty;
use Faker\Generator as Faker;

$factory->define(type_of_specialty::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'color' =>$faker->word,
        'icon' => $faker->word,
    ];
});
