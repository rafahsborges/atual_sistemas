<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Plano::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
