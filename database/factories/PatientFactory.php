<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Patient;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'mobile' => $faker->word,
        'email' => $faker->email,
        'address' => $faker->address,
        'user_id' => mt_rand(1,10),
    ];
});
