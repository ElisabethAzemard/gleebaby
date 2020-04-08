<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Child;
use Faker\Generator as Faker;

$factory->define(Child::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->firstName,
        'date_of_birth' => $faker->date,
        'family_id'     => App\Family::pluck('id')->random(),
    ];
});
