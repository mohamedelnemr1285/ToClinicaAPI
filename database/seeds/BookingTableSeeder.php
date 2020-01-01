<?php

use Illuminate\Database\Seeder;
use App\Booking;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Booking::class , 35)->create();

    }
}
