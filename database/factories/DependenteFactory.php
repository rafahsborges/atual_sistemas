<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Dependente::class, function (Faker $faker) {
    return [
        'id_cliente' => factory(App\Parentesco::class),
        'nome' => $faker->word,
        'nascimento' => $faker->date(),
        'id_parentesco' => $faker->randomNumber(),
        'deleted_at' => $faker->dateTime(),
    ];
});
