<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Family;
use Faker\Generator as Faker;

$factory->define(Family::class, function (Faker $faker) {
    return [
        'subscription_id' => factory('App\Subscription')->create()->id
    ];
});
