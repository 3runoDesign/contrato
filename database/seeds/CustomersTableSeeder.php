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
        $agreements = Agreement::all();

        factory(Customer::class, 100)
            ->create();
    }
}
