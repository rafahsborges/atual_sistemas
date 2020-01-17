<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Plano::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'deleted_at' => $faker->dateTime(),
    ];
});
