<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Availability;
use Faker\Generator as Faker;

$factory->define(Availability::class, function (Faker $faker) {
    return [
        'start'             => $faker->date,
        'end'               => $faker->date,
        'practitioner_id'   => App\Practitioner::pluck('id')->random(),
    ];
});
