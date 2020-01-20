<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Conta::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'banco' => $faker->word,
        'agencia' => $faker->randomFloat(),
        'digito_agencia' => $faker->word,
        'conta' => $faker->randomFloat(),
        'digito_conta' => $faker->word,
        'codigo_empresa' => $faker->word,
        'carteira' => $faker->randomFloat(),
        'tipo' => $faker->randomFloat(),
        'mensagem_1' => $faker->word,
        'mensagem_2' => $faker->word,
        'cpf_cnpj' => $faker->word,
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
