<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CONTR\Models\User::class)->create([
            'email' => 'admin@user.com'
        ]);
    }
}
