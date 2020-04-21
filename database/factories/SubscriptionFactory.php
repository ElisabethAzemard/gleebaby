<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {

    $startingDate = $faker->dateTimeBetween('this month', '+6 days');
    // Random datetime of the current week *after* `$startingDate`
    $endingDate   = $faker->dateTimeBetween($startingDate, strtotime('+4 months'));

    return [
        'start_of_subscription' => $startingDate,
        'end_of_subscription'   => $endingDate,
        'activation_key'        => $faker->unique()->randomNumber,
    ];
});
