<?php

use App\AdviserClearance;
use App\DepartmentRequirement;
use App\SchoolClass;
use App\Section;
use App\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SemesterSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(StrandSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(SchoolClassSeeder::class);
        $this->call(SectionSeeder::class);

        //ATTACH EVERY SECTION A CLASS
        // Populate the pivot table
        $school_classes = SchoolClass::all();

        Section::all()->each(function ($section) use ($school_classes) { 
            $section->school_classes()->attach(
                $school_classes->random(rand(6, 10))->pluck('id')->toArray()
            ); 
        });


        $this->call(StudentSeeder::class);

        $students = Student::select('id')->get()->map(function($student){
            return [
                'student_id' => $student->id
            ];
        })->toArray();

        AdviserClearance::insert($students);


        $this->call(DepartmentRequirementSeeder::class);
        $this->call(ClassRequirementSeeder::class);
    }
}