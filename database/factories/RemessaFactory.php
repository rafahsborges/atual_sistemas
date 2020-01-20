<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Remessa::class, function (Faker $faker) {
    return [
        'data' => $faker->dateTime(),
        'id_usuario' => $faker->randomFloat(),
        'nome' => $faker->word,
        'sequencia' => $faker->randomFloat(),
        'id_conta' => factory(App\Conta::class),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
