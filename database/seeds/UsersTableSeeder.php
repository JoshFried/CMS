<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email', 'bahdcoder@gmail.com')->first(); 

        if (!$user) {
            User::create([
                'name' => 'Josh Fried',
                'email' => 'josh.fried13@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);

        }
    }
}
