<?php

use Carbon\Carbon;
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
    $price = array_random([1500.00, 600]);
    $portion = $price / 3;

    $dateEventPre = $faker->randomElement([
        Carbon::today()->addDay(5)->addMonth(0)->format('d/m/Y'),
        Carbon::today()->addDay(8)->addMonth(0)->format('d/m/Y'),
        Carbon::today()->addDay(2)->addMonth(0)->format('d/m/Y'),
        Carbon::today()->addDay(3)->addMonth(0)->format('d/m/Y'),
        Carbon::today()->addDay(9)->addMonth(0)->format('d/m/Y'),
        Carbon::today()->addDay(15)->addMonth(1)->format('d/m/Y'),
        Carbon::today()->addDay(20)->addMonth(2)->format('d/m/Y'),
    ]);
    $dateEvent = $faker->randomElement([
        Carbon::today()->addDay(10)->addMonth(1)->format('d/m/Y'),
        Carbon::today()->addDay(2)->addMonth(3)->format('d/m/Y'),
        Carbon::today()->addDay(5)->addMonth(4)->format('d/m/Y'),
    ]);

    return [
        'title' => $faker->randomElement(['Pré-Casamento', 'Casamento', 'Ensaio Restrato']),
        'enrolment' => 100000 + $customer_ids,
        'date_agreement' => Carbon::today(),
        'price' => $price,
        'event_schedule' => $faker->randomElement([
            "{$dateEventPre} - Pré-Casamento; {$dateEvent} - Casamento (Araguaína-TO)",
            "{$dateEventPre} - Pré-Casamento; {$dateEvent} - Casamento (Palestina-PA)",
            "{$dateEventPre} - Sessão Retrato"
        ]),
        'total_hours' => array_random([4, 10]),
        'description_services' => $faker->randomElement([
            '6 horas de cobertura com um fotógrafo; 2 horas de making of da noiva; Sessão de pré-casamento; Pendrive com fotos em alta e editadas; Galeria online por 6 meses',
            '4 horas de sessão retrato',
            '4 hora de pré-casamento'
        ]),
        'payment_terms' => $faker->randomElement([
            'Fica acordado o pagamento avista até a data 10/01/2018',
            "Fica acordado o pagamento em 3x de R$ {$portion} para todo dia 15 do mês. Iniciando no dia 10/01/2018"
        ]),
        'customer_id' => $customer_ids
    ];
});