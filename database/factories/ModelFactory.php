<?php

/** @var  Factory $factory */

use Illuminate\Database\Eloquent\Factory;

/** @var  Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'is_admin' => $faker->boolean(),
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Plano::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Parentesco::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\EstadoCivil::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->boolean(),
        'nome' => $faker->sentence,
        'nascimento' => $faker->date(),
        'rg' => $faker->sentence,
        'cpf' => $faker->sentence,
        'insc_municipal' => $faker->sentence,
        'cnpj' => $faker->sentence,
        'sexo' => $faker->sentence,
        'profissao' => $faker->sentence,
        'local_trabalho' => $faker->sentence,
        'telefone' => $faker->sentence,
        'celular' => $faker->sentence,
        'logradouro' => $faker->sentence,
        'numero' => $faker->sentence,
        'complemento' => $faker->sentence,
        'bairro' => $faker->sentence,
        'cidade' => $faker->sentence,
        'uf' => $faker->sentence,
        'email' => $faker->email,
        'observacao' => $faker->sentence,
        'cep' => $faker->sentence,
        'celular2' => $faker->sentence,
        'celular3' => $faker->sentence,
        'id_cliente_responsavel' => $faker->randomNumber(5),
        'id_estado_civil' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Dependente::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'nascimento' => $faker->date(),
        'id_cliente' => $faker->sentence,
        'id_parentesco' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Conta::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'banco' => $faker->sentence,
        'agencia' => $faker->randomNumber(5),
        'digito_agencia' => $faker->sentence,
        'conta' => $faker->randomNumber(5),
        'digito_conta' => $faker->sentence,
        'codigo_empresa' => $faker->sentence,
        'carteira' => $faker->randomNumber(5),
        'tipo' => $faker->randomNumber(5),
        'mensagem_1' => $faker->sentence,
        'mensagem_2' => $faker->sentence,
        'cpf_cnpj' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Contrato::class, static function (Faker\Generator $faker) {
    return [
        'primeira_parcela' => $faker->date(),
        'ultima_parcela' => $faker->date(),
        'data_assinatura' => $faker->date(),
        'qtd_parcelas' => $faker->randomNumber(5),
        'tipo_pagamento' => $faker->randomNumber(5),
        'valor' => $faker->randomNumber(5),
        'plano_funeral' => $faker->boolean(),
        'desconto' => $faker->randomNumber(5),
        'juros' => $faker->randomNumber(5),
        'multa' => $faker->randomNumber(5),
        'validade_contrato' => $faker->date(),
        'id_cliente' => $faker->sentence,
        'id_plano' => $faker->sentence,
        'id_conta' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\ContratoParcela::class, static function (Faker\Generator $faker) {
    return [
        'vencimento' => $faker->date(),
        'pagamento' => $faker->date(),
        'id_boleto' => $faker->randomNumber(5),
        'id_carne' => $faker->randomNumber(5),
        'valor' => $faker->randomNumber(5),
        'numero_parcela' => $faker->randomNumber(5),
        'valor_pagamento' => $faker->randomNumber(5),
        'id_contrato' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Boleto::class, static function (Faker\Generator $faker) {
    return [
        'status' => $faker->boolean(),
        'id_contrato_parcela' => $faker->sentence,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Remessa::class, static function (Faker\Generator $faker) {
    return [
        'data' => $faker->dateTime,
        'id_usuario' => $faker->randomNumber(5),
        'nome' => $faker->sentence,
        'sequencia' => $faker->randomNumber(5),
        'id_conta' => $faker->sentence,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\RemessaBoleto::class, static function (Faker\Generator $faker) {
    return [
        'id_boleto' => $faker->sentence,
        'id_remessa' => $faker->sentence,
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Sexo::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Uf::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
