<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\RemessaBoleto::class, function (Faker $faker) {
    return [
        'id_boleto' => factory(App\Boleto::class),
        'id_remessa' => factory(App\Remessa::class),
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
