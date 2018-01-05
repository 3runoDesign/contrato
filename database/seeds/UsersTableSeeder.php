<?php

use CONTR\Models\User;
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

        if (config('app.env') !== 'production') {
            factory(User::class)->create([
                'email' => 'admin@user.com'
            ]);
        }

        factory(User::class)->create([
            'name' => 'Bruno Fernando dos Santos Silva',
            'email' => 'bruno2fernando@gmail.com',
            'password' => Hash::make('153159951BRUgbl'),
            'remember_token' => str_random(10)
        ]);
    }
}
