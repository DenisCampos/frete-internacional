<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Pacote::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name(),
        'descricao' => $faker->sentence(2), 
        'status' => 1, 
    ];
});
