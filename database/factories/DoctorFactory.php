<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Doctor;
$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => '',
        'nationality' => $faker->name,
        'price' => mt_rand(1,10),

        'detailes' => $faker->address,
        'clinic_id' => mt_rand(1,10),
        'specialty_id' => mt_rand(1,10),
        'type_of_specialty_id' => mt_rand(1,10),
        ];
});
