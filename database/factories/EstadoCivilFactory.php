<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\EstadoCivil::class, function (Faker $faker) {
    return [
        'descricao' => $faker->word,
    ];
});
