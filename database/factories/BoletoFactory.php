<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Boleto::class, function (Faker $faker) {
    return [
        'id_contrato_parcela' => factory(App\ContratoParcela::class),
        'status' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
