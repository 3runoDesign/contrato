<?php

use CONTR\Models\Agreement;
use CONTR\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Customer::class)
            ->create([
                'name' => 'Joaneyde Silva Simão',
                'cpf' => '92293247287',
                'rg' => '051137812014-1',
                'gender' => 0,
                'email' => 'joaneyde_simao@hotmail.com',
                'phone' => '94 99234-4934',

                'cep' => '68535000',
                'address' => 'RUA X',
                'building_number' => '00',
                'complement' => 'COMPLEMENTO do endereço',
                'district' => 'BAIRRO',
                'city' => 'Palestina',
                'uf' => 'PA',

                'birthday' => '1991-03-15',
                'description' => 'Noiva da Will',
            ]);

        factory(Customer::class, 10)
            ->create();
    }
}
