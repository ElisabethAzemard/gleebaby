<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CaretakerForm;
use Faker\Generator as Faker;

$factory->define(CaretakerForm::class, function (Faker $faker) {
    return [
        'mood' => $faker->word
    ];
});
