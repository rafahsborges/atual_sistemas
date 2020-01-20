<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Cliente::class, function (Faker $faker) {
    return [
        'tipo' => $faker->boolean,
        'nome' => $faker->word,
        'nascimento' => $faker->dateTime(),
        'rg' => $faker->word,
        'cpf' => $faker->word,
        'insc_municipal' => $faker->word,
        'cnpj' => $faker->word,
        'sexo' => $faker->word,
        'profissao' => $faker->word,
        'local_trabalho' => $faker->word,
        'telefone' => $faker->word,
        'celular' => $faker->word,
        'logradouro' => $faker->word,
        'numero' => $faker->word,
        'complemento' => $faker->word,
        'bairro' => $faker->word,
        'cidade' => $faker->word,
        'uf' => $faker->word,
        'email' => $faker->safeEmail,
        'observacao' => $faker->word,
        'cep' => $faker->word,
        'celular2' => $faker->word,
        'celular3' => $faker->word,
        'id_cliente_responsavel' => $faker->randomNumber(),
        'id_estado_civil' => $faker->randomNumber(),
        'enabled' => $faker->boolean,
    ];
});
