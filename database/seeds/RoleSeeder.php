<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => "Teacher",
            'department_id' => "1"
        ]);
        Role::create([
            'role_name' => "Registrar",
            'department_id' => "2"
        ]);

        Role::create([
            'role_name' => "Librarian",
            'department_id' => "5"
        ]);
        Role::create([
            'role_name' => "OSA Officer",
            'department_id' => "4"
        ]);
        Role::create([
            'role_name' => "Cashier",
            'department_id' => "3"
        ]);
        Role::create([
            'role_name' => "Marketing Head",
            'department_id' => "6"
        ]);
    }
}