<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Clinic;

$factory->define(Clinic::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'address' => $faker->address,
        'image' => '',
        'link' => $faker->name,
        'city_id' => mt_rand(1,10),
        'specialty_id' => mt_rand(1,10),
        'type_of_specialty_id' => mt_rand(1,10),


    ];
});
