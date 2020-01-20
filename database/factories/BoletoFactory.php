<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Boleto::class, function (Faker $faker) {
    return [
        'status' => $faker->boolean,
        'id_contrato_parcela' => factory(App\ContratoParcela::class),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
