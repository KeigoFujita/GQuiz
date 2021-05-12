<?php

use App\User;
use Illuminate\Database\Seeder;
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
        $user = User::where('email', 'keigofujita19@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Jemar Dematera',
                'email' => 'demater.jemar@gmail.com',
                'password' => Hash::make('password')
            ]);

            User::create([
                'name' => 'N/A',
                'email' => 'manilyn123@gmail.com',
                'password' => Hash::make('manilyn1234')
            ]);

            User::create([
                'name' => 'N/A',
                'email' => 'jemardematera@gmail.com',
                'password' => Hash::make('jemar1234'),  
                'role' => 'student'
            ]);
        }
    }
}