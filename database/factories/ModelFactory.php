<?php

/** @var  Factory $factory */

use Illuminate\Database\Eloquent\Factory;

/** @var  Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
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
        'descricao' => $faker->sentence,
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
