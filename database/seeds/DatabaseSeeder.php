<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ClinicTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(AdvertisementTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
        $this->call(Booking_itemTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(DiscountTableSeeder::class);
        $this->call(ServiceNamesTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(SpecialtyTableSeeder::class);
        $this->call(TypeOfSpecialtyTableSeeder::class);
        $this->call(usersTableSeeder::class);






    }
}
