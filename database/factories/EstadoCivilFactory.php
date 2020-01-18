<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\EstadoCivil::class, function (Faker $faker) {
    return [
        'descricao' => $faker->word,
        'deleted_at' => $faker->dateTime(),
    ];
});