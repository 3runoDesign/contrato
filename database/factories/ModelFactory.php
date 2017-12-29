<?php

use CONTR\Models\Agreement;
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
    $str_gender = $faker->randomElements(['male', 'female']);
    $gender = ['female' => 0, 'male' => 1];

    return [
        'name' => $faker->name($str_gender[0]),
        'cpf' => $faker->cpf(false),
        'rg' => $faker->rg(false) . ' SSP/' . collect(\CONTR\Models\State::$states)->random(),
        'gender' => $gender[array_shift($str_gender)],
        'email' => $faker->email,
        'phone' => $faker->phone,

        'cep' => $faker->postcode,
        'address' => $faker->streetName,
        'building_number' => $faker->buildingNumber,
        'complement' => 'Complemento de endereço',
        'district' => $faker->randomElement(['Bairro 1', 'Bairro 2', 'Bairro 3', 'Bairro 4', 'Bairro 5']),
        'city' => $faker->city,
        'uf' => $faker->stateAbbr,

        'birthday' => $faker->date(),
        'description' => 'Uma breve descrição do cliente'
    ];
});

$factory->define(Agreement::class, function (Faker $faker) {
    $customer_ids = Customer::all()->random()->id;

    return [
        'title' => $faker->sentence,
        'enrolment' => str_random(40),
        'date_agreement' => $faker->dateTime('now', null),
        'date_event' => $faker->dateTime('now', null),
        'customer_id' => $customer_ids
    ];
});