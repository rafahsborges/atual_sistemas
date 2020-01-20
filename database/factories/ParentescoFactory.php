<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Parentesco::class, function (Faker $faker) {
    return [
        'descricao' => $faker->word,
        'enabled' => $faker->boolean,
        'deleted_at' => $faker->dateTime(),
    ];
});
