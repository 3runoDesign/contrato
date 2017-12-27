<?php

use CONTR\Models\Customer;
use CONTR\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->streetName,
        'building_number' => $faker->buildingNumber,
        'district' => $faker->secondaryAddress,
        'locality' => $faker->city,
        'uf' => $faker->stateAbbr,
        'cpf' => $faker->cpf(false),
        'rg' => $faker->rg(false),
        'phone' => $faker->phoneNumber,
    ];
});