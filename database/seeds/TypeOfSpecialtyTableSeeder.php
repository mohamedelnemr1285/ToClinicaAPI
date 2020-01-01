<?php

use Illuminate\Database\Seeder;
use App\type_of_specialty;


class TypeOfSpecialtyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(type_of_specialty::class , 35)->create();

    }
}
