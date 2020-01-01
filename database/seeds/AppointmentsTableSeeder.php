<?php

use Illuminate\Database\Seeder;
use App\Appointments;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Appointments::class , 35)->create();

    }
}
