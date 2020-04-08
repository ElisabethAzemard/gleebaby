<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Caretaker;
use Faker\Generator as Faker;

$factory->define(Caretaker::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->unique()->email,
        'password'          => $faker->unique()->password,
        'age'               => $faker->numberBetween(20, 50),
        'sponsor_id'        => App\Sponsor::pluck('id')->random(),
        'family_id'         => App\Family::pluck('id')->random(),
        'caretakerform_id'  => App\Caretakerform::pluck('id')->random(),
    ];
});
