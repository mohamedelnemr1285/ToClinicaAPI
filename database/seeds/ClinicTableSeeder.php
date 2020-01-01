<?php

use Illuminate\Database\Seeder;
use App\Clinic;


class ClinicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Clinic::class , 15)->create();
    }
}
