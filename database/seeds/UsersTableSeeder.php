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
                'password' => Hash::make('09973694389')
            ]);

            User::create([
                'name' => 'N/A',
                'email' => 'matt@gmail.com',
                'password' => Hash::make('matt12345')
            ]);

            User::create([
                'name' => 'N/A',
                'email' => 'irish@gmail.com',
                'password' => Hash::make('irish1234'),  
                'role' => 'student'
            ]);
        }
    }
}
