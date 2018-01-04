<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Pacote::class, function (Faker $faker) {
    return [
        'descricao' => $faker->sentence(2), 
    ];
});
