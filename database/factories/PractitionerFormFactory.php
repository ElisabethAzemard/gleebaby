<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PractitionerForm;
use Faker\Generator as Faker;

$factory->define(PractitionerForm::class, function (Faker $faker) {
    return [
        'short_description' => $faker->sentence(10)
    ];
});
