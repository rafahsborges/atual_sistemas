<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Parentesco::class, function (Faker $faker) {
    return [
        'descricao' => $faker->word,
        'deleted_at' => $faker->dateTime(),
    ];
});
