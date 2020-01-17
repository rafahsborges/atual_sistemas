<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Remessa::class, function (Faker $faker) {
    return [
        'data' => $faker->dateTime(),
        'id_usuario' => $faker->randomFloat(),
        'nome' => $faker->word,
        'sequencia' => $faker->randomFloat(),
        'id_conta' => factory(App\Conta::class),
        'deleted_at' => $faker->dateTime(),
    ];
});
