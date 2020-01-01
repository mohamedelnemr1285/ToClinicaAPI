<?php

use Illuminate\Database\Seeder;
use App\Doctor;


class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Doctor::class , 15)->create();

    }
}
