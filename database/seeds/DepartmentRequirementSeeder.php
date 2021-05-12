<?php

use App\DepartmentClearance;
use App\DepartmentRequirement;
use App\Student;
use Illuminate\Database\Seeder;

class DepartmentRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //1 - None, 2 - Registrar, 3 - Accounting

        DepartmentRequirement::create([
            'requirement_description' => 'Please pay Php. 1500 for energy fee.',
            'requirement' => 'Energy Fee',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 3
        ]);

        DepartmentRequirement::create([
            'requirement_description' => 'Please pay your tuition fee.',
            'requirement' => 'Tuition Fee',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 3
        ]);

        DepartmentRequirement::create([
            'requirement_description' => 'Please bring copy of your registration form.',
            'requirement' => 'Graduation Fee',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 3
        ]);


        //REGISTRAR'S OFFICE
        DepartmentRequirement::create([
            'requirement_description' => 'Please bring original copy of your birth certificate.',
            'requirement' => 'NSO Birth certificate',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 2
        ]);

        DepartmentRequirement::create([
            'requirement_description' => 'Please bring 2pcs of 2X2 picture',
            'requirement' => '2X2 Picture',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 2
        ]);

        DepartmentRequirement::create([
            'requirement_description' => 'Please look for Ms. Lorelei before returning your toga.',
            'requirement' => 'Returning of Toga',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 2
        ]);

        DepartmentRequirement::create([
            'requirement_description' => 'Please look for Ms. Lorelei before returning your books.',
            'requirement' => 'Returning of books',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 2
        ]);

        DepartmentRequirement::create([
            'requirement_description' => 'Check your email for further announcement.',
            'requirement' => 'Graduation Ball',
            'deadline' => now()->addDays(rand(1,31)),
            'department_id' => 2
        ]);

        $students = Student::select('id')->get();
        DepartmentRequirement::select('id')->each(function($requirement) use ($students){
           $random = [];

           for ($i=1; $i < 10; $i++) { 
               array_push($random,rand(0,1));
           }

           shuffle($random);
           $data =  $students->map(function($student) use ($requirement,$random){
                return[
                    'student_id' => $student->id,
                    'department_requirement_id' => $requirement->id,
                    'status'=> array('complete','incomplete')[$random[rand(0,count($random) - 1)]],
                    'created_at'=> now(),
                    'updated_at'=> now()->subDays(rand(0,31))
                ];
            })->toArray();
  
            // dd($data);
            DepartmentClearance::insert($data);
        });

    }
}
