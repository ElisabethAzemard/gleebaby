<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->email,
        'password'          => $faker->password,
        'email_verified_at' => $faker->date,
        'phone_number'      => $faker->e164PhoneNumber,
        'remember_token'    => $faker->randomNumber,
    ];
});
