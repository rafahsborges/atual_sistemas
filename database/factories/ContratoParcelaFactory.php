<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ContratoParcela::class, function (Faker $faker) {
    return [
        'vencimento' => $faker->date(),
        'pagamento' => $faker->date(),
        'id_boleto' => $faker->randomFloat(),
        'id_carne' => $faker->randomFloat(),
        'valor' => $faker->randomFloat(),
        'numero_parcela' => $faker->randomFloat(),
        'valor_pagamento' => $faker->randomFloat(),
        'id_contrato' => factory(App\Contrato::class),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
