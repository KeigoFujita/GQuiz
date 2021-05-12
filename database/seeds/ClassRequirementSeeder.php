<?php

use App\ClassClearance;
use App\ClassRequirement;
use App\SchoolClass;
use App\Section;
use Illuminate\Database\Seeder;

class ClassRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sections with classes and students
        //$sections = Section::withCount('students','school_classes')->get()->where('students_count','>=','0')->where('school_classes_count','>=','0');
        
        $sample_requirements = [
            [
                'requirement' => 'Prelim',
                'description' => 'Prelim Exam',
            ],
            [
                'requirement' => 'Midterm',
                'description' => 'Midterm Exam',
            ],
            [
                'requirement' => 'Finals',
                'description' => 'Final Exam',
            ],
            [
                'requirement' => 'First Activity',
                'description' => 'Please submit your first activity.',
            ],
            [
                'requirement' => 'Practice Video',
                'description' => 'Please submit your practice video.',
            ],
            [
                'requirement' => 'Interview',
                'description' => 'Conduct an interview about globalization and its effect.',
            ],
            [
                'requirement' => 'Thesis',
                'description' => 'Please pass chapter 1 documentation and proposed client.',
            ],
            [
                'requirement' => 'Group Activity',
                'description' => 'Make a presentation about climate change.',
            ],
            [
                'requirement' => 'PRELIM - Activity 3',
                'description' => 'Please review about the anatomy of body.',
            ],
            [
                'requirement' => 'MIDTERM - Quiz 3',
                'description' => 'Please review about the anatomy of science.',
            ],
            [
                'requirement' => 'FINALS - Quiz 4',
                'description' => 'Please review about the gaussian elimination.',
            ],
            [
                'requirement' => 'PRE FINALS - 3',
                'description' => 'Please review about our last topic.',
            ],
        ];

        //CREATE ALL REQUIREMENT FOR EACH CLASSES
        $classes = SchoolClass::select('id')->get();
        $class_requirements = [];
        // dd($sample_requirements);
        foreach($classes as $class){
            $i = 1;
            $limit = rand(0,3);
            $sample_requirements = collect($sample_requirements)->shuffle(count($sample_requirements))->toArray();
            foreach ($sample_requirements as $requirement) {
                if($limit == $i  || $limit == 0) break;
                array_push($class_requirements,
                [
                    'requirement_description' => $requirement['description'],
                    'requirement' => $requirement['requirement'],
                    'deadline' => now()->addDays(rand(1,31)),
                    'school_classes_id' => $class->id,
                    'created_at' => now(),
                    'updated_at'=>now()
                ]
                );
                $i++;
            }
        };

        ClassRequirement::insert($class_requirements);


        //CREATE CLEARANCE FOR EACH CLASS REQUIREMENTS
        $class_requirements = ClassRequirement::with('school_class')->get();
        $class_clearances = [];
       
        foreach ($class_requirements as $class_requirement) {
            $students = $class_requirement->school_class->students;
           foreach ($students as $student) {
               array_push($class_clearances,[
                    'student_id'=>$student->id,
                    'class_requirement_id' => $class_requirement->id,
                    'status'=> array('complete','incomplete')[rand(0,1)],
                    'created_at' => now(),
                    'updated_at'=> now()->subDays(rand(0,31))
               ]);
           }
        }

        $chunks = array_chunk($class_clearances,5000);

        foreach ($chunks as $chunk) { 
            ClassClearance::insert($chunk);
        }

    }
}
