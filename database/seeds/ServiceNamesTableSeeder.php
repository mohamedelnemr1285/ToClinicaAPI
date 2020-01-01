<?php

use Illuminate\Database\Seeder;
use App\ServiceNames;


class ServiceNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ServiceNames::class , 35)->create();

    }
}
