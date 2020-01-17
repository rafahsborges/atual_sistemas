<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'email' => $faker->safeEmail,
        'senha' => $faker->word,
        'is_admin' => $faker->boolean,
        'remember_token' => Str::random(10),
        'deleted_at' => $faker->dateTime(),
    ];
});
