<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Contrato::class, function (Faker $faker) {
    return [
        'primeira_parcela' => $faker->date(),
        'ultima_parcela' => $faker->date(),
        'data_assinatura' => $faker->date(),
        'qtd_parcelas' => $faker->randomFloat(),
        'tipo_pagamento' => $faker->randomFloat(),
        'valor' => $faker->randomFloat(),
        'plano_funeral' => $faker->boolean,
        'desconto' => $faker->randomFloat(),
        'juros' => $faker->randomFloat(),
        'multa' => $faker->randomFloat(),
        'validade_contrato' => $faker->date(),
        'id_cliente' => factory(App\Cliente::class),
        'id_plano' => factory(App\Plano::class),
        'id_conta' => factory(App\Conta::class),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
