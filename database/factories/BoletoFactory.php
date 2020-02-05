<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Boleto::class, function (Faker $faker) {
    return [
        'status' => $faker->boolean,
        'id_parcela' => factory(App\Parcela::class),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
