<?php

use Illuminate\Database\Seeder;
use App\Booking_item;

class Booking_itemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Booking_item::class , 35)->create();

    }
}
