<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ----- Create Sponsors -----
        factory(App\Sponsor::class, 10)->create();

        // ----- Create Caretakers -----
        factory(App\Caretaker::class, 25)->create()->each(function ($caretaker) {
         });

        // ----- Create Children -----
        factory(App\Sponsor::class, 10)->create();

        // ----- Create Practitioners -----
        factory(App\Practitioner::class, 50)->create();

        // ----- Create Appointments -----
        factory(App\Appointment::class, 55)->create();

        // ----- Create Availabilities -----
        factory(App\Availability::class, 50)->create();



    }
}
