<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'purpose'           => $faker->text(50),
        'start'             => $faker->date,
        'end'               => $faker->date,
        'practitioner_id'   => App\Practitioner::pluck('id')->random(),
    ];
});
