<?php

use Illuminate\Database\Seeder;
use App\Discount;


class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Discount::class , 35)->create();

    }
}
