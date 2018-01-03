<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => 'Denis Campos',
        'email' => 'denismrc8@gmail.com',
        'password' => $password ?: $password = bcrypt('secret'),
        'tipo' => 1,
        'endereco' => 'Rua Rigel', 
        'bairro' => 'Recanto', 
        'numero' => 119, 
        'cidade' => 'São Luis', 
        'uf' => 'Maranhão', 
        'pais' => 'Brasil',
        'cep' => '65070500',
        'remember_token' => str_random(10),
    ];
});
