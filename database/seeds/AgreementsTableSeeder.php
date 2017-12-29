<?php

use CONTR\Models\Agreement;
use CONTR\Models\Customer;
use Illuminate\Database\Seeder;

class AgreementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agreement::class, 10)
            ->create();
    }
}