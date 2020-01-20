<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Dependente::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'nascimento' => $faker->date(),
        'id_cliente' => factory(App\Parentesco::class),
        'id_parentesco' => $faker->randomNumber(),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
