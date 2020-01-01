<?php

use Illuminate\Database\Seeder;
use App\Specialty;


class SpecialtyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Specialty::class , 35)->create();

    }
}
