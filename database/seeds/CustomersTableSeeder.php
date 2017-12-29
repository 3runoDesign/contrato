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

        factory(Customer::class, 50)
            ->create();
    }
}
