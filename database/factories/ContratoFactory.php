<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Contrato::class, function (Faker $faker) {
    return [
        'id_cliente' => factory(App\Cliente::class),
        'primeira_parcela' => $faker->date(),
        'ultima_parcela' => $faker->date(),
        'data_assinatura' => $faker->date(),
        'qtd_parcelas' => $faker->randomFloat(),
        'tipo_pagamento' => $faker->randomFloat(),
        'id_plano' => factory(App\Plano::class),
        'valor' => $faker->randomFloat(),
        'plano_funeral' => $faker->boolean,
        'desconto' => $faker->randomFloat(),
        'juros' => $faker->randomFloat(),
        'multa' => $faker->randomFloat(),
        'id_conta' => factory(App\Conta::class),
        'validade_contrato' => $faker->date(),
        'deleted_at' => $faker->dateTime(),
    ];
});
