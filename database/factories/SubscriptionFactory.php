<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {

    $startingDate = $faker->dateTimeThisYear($max='now');
    $endingDate   = strtotime('+4 month', $startingDate->getTimestamp());

    return [
        'start_of_subscription' => $startingDate,
        'end_of_subscription'   => $endingDate,
        'activation_key'        => $faker->unique()->randomNumber(20),
    ];
});
