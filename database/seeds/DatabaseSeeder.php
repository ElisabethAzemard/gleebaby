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
            // create a family for each new caretaker
            $caretaker->family()->save(factory(App\Family::class)->make());

        });

        // ----- Create Children -----
        factory(App\Sponsor::class, 50)->create();

        // ----- Create Practitioners -----
        factory(App\Practitioner::class, 50)->create();

        // ----- Create Appointments -----
        factory(App\Appointment::class, 75)->create();

        // ----- Create Availabilities -----
        factory(App\Availability::class, 150)->create();



    }
}
