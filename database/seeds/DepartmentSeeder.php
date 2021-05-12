<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = Department::where('department_name', 'none')->first();

        if (!$department) {
            Department::create([
                'department_name' => 'none',
            ]);
        }

        Department::create([
            'department_name' => "Registrar's Office",
        ]);
        Department::create([
            'department_name' => "Accounting",
        ]);
        Department::create([
            'department_name' => "Office of the Students Affair (OSA)",
        ]);
        Department::create([
            'department_name' => "Library",
        ]);
        Department::create([
            'department_name' => "Marketing",
        ]);
    }
}