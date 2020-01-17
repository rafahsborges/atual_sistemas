<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\ContratoParcela::class, function (Faker $faker) {
    return [
        'id_contrato' => factory(App\Contrato::class),
        'vencimento' => $faker->date(),
        'pagamento' => $faker->date(),
        'id_boleto' => $faker->randomFloat(),
        'id_carne' => $faker->randomFloat(),
        'valor' => $faker->randomFloat(),
        'numero_parcela' => $faker->randomFloat(),
        'valor_pagamento' => $faker->randomFloat(),
        'deleted_at' => $faker->dateTime(),
    ];
});
