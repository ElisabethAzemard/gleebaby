<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Practitioner;
use Faker\Generator as Faker;

$factory->define(Practitioner::class, function (Faker $faker) {
    return [
        'first_name'            => $faker->firstName,
        'last_name'             => $faker->lastName,
        'email'                 => $faker->unique()->email,
        'password'              => $faker->unique()->password,
        'email_verified_at'     => $faker->date,
        'practitionerform_id'   => factory('App\PractitionerForm')->create()->id,
        'remember_token'        => $faker->unique()->randomNumber,
    ];
});
