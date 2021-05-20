<?php

use App\AdviserClearance;
use App\Section;
use App\Strand;
use App\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    //    dump( factory(Student::class,2)->create());

        $students = [];
        $faker = Faker::create();
        $sections = Section::select('id','strand_id')->inRandomOrder()->get();

        for ($i=1; $i <=478; $i++) {
            $section = $faker->randomElement($sections);
            array_push($students,[
                'lrn' => $faker->unique()->numerify($string = '############'),
                'grade_level' => $faker->randomElement(['11','12']),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'gender' => $faker->randomElement(['male','female']),
                'section_id'=> $section->id,
                'strand_id'=> $section->strand->id
            ]);
        }

        Student::insert($students);

        Student::create([
            'lrn' => $faker->unique()->numerify($string = '############'),
            'grade_level' => $faker->randomElement(['1','2','3']),
            'first_name' => 'Irish',
            'middle_name' => 'Onanay',
            'last_name' => 'Aspillaga',
            'gender' => 'female',
            'section_id'=> $section->id,
            'strand_id'=> $section->strand->id,
            'user_id' => 3
        ]);

        // $student = Student::create([
        //     'lrn' => '109397050207',
        //     'grade_level' => '11',
        //     'first_name' => 'Keigo Victor',
        //     'middle_name' => 'Templo',
        //     'last_name' => 'Fujita',
        //     'gender' => 'male',
        // ]);

        // $student->section()->associate(1);
        // $student->strand()->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109397050208',
        //     'grade_level' => '11',
        //     'first_name' => 'George',
        //     'middle_name' => 'Alcanar',
        //     'last_name' => 'Reyes',
        //     'gender' => 'male',
        // ]);
        // $student->section()->associate(3);
        // $student->strand()->associate(2);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);


        // $student = Student::create([
        //     'lrn' => '109397050209',
        //     'grade_level' => '11',
        //     'first_name' => 'Darryl',
        //     'middle_name' => 'N/A',
        //     'last_name' => 'Hollero',
        //     'gender' => 'male',
        // ]);
        // $student->section()->associate(2);
        // $student->strand()->associate(2);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109397050210',
        //     'grade_level' => '11',
        //     'first_name' => 'Jemar',
        //     'middle_name' => 'Landero',
        //     'last_name' => 'Dematera',
        //     'gender' => 'male',
        //     'user_id' => 3
        // ]);
        // $student->section()->associate(3);
        // $student->strand()->associate(3);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109397050211',
        //     'grade_level' => '11',
        //     'first_name' => 'Kurt Lupin',
        //     'middle_name' => 'Concepcion',
        //     'last_name' => 'Orioque',
        //     'gender' => 'male',
        // ]);
        // $student->section()->associate(3);
        // $student->strand()->associate(4);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109397050212',
        //     'grade_level' => '11',
        //     'first_name' => 'Eve',
        //     'middle_name' => 'Maiso',
        //     'last_name' => 'Maturan',
        //     'gender' => 'female',
        // ]);
        // $student->section()->associate(3);
        // $student->strand()->associate(5);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109397050213',
        //     'grade_level' => '11',
        //     'first_name' => 'Ellysa Kaye',
        //     'middle_name' => 'Quinola',
        //     'last_name' => 'Jarilla',
        //     'gender' => 'female',
        // ]);
        // $student->section()->associate(2);
        // $student->strand()->associate(2);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);


        // Kay george

        // $student = Student::create([
        //     'lrn' => '109234578930',
        //     'grade_level' => '11',
        //     'first_name' => 'Ruzzel',
        //     'middle_name' => 'Mesh',
        //     'last_name' => 'Agustin',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578931',
        //     'grade_level' => '11',
        //     'first_name' => 'Thomas Jefferson',
        //     'middle_name' => 'Shin',
        //     'last_name' => 'Aldover',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578933',
        //     'grade_level' => '11',
        //     'first_name' => 'John Lester',
        //     'middle_name' => 'Naso',
        //     'last_name' => 'Bacton',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578934',
        //     'grade_level' => '11',
        //     'first_name' => 'Michaell',
        //     'middle_name' => 'Lim',
        //     'last_name' => 'Bollosa',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578935',
        //     'grade_level' => '11',
        //     'first_name' => 'Mark Christian',
        //     'middle_name' => 'Luis',
        //     'last_name' => 'Cordero',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578936',
        //     'grade_level' => '11',
        //     'first_name' => 'Kurt Michael',
        //     'middle_name' => 'Sabio',
        //     'last_name' => 'Dilla',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578937',
        //     'grade_level' => '11',
        //     'first_name' => 'Kim Francis',
        //     'middle_name' => 'Lu',
        //     'last_name' => 'Esplana',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578938',
        //     'grade_level' => '11',
        //     'first_name' => 'Justin Lei',
        //     'middle_name' => 'Demao',
        //     'last_name' => 'Laomoc',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578939',
        //     'grade_level' => '11',
        //     'first_name' => 'Julius',
        //     'middle_name' => 'Gaba',
        //     'last_name' => 'Llamilo',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '109234578940',
        //     'grade_level' => '11',
        //     'first_name' => 'Leo Angelo',
        //     'middle_name' => 'Ewis',
        //     'last_name' => 'Magno',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457841',
        //     'grade_level' => '11',
        //     'first_name' => 'Aljon',
        //     'middle_name' => 'Baso',
        //     'last_name' => 'Mojico',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457842',
        //     'grade_level' => '11',
        //     'first_name' => 'Carlo',
        //     'middle_name' => 'Magma',
        //     'last_name' => 'Nugas',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457843',
        //     'grade_level' => '11',
        //     'first_name' => 'Marlon',
        //     'middle_name' => 'Otso',
        //     'last_name' => 'Nugas',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457844',
        //     'grade_level' => '11',
        //     'first_name' => 'Roevic',
        //     'middle_name' => 'Cubi',
        //     'last_name' => 'Ochavillo',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457845',
        //     'grade_level' => '11',
        //     'first_name' => 'Kleff',
        //     'middle_name' => 'Tino',
        //     'last_name' => 'Ordaneza',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457846',
        //     'grade_level' => '11',
        //     'first_name' => 'Resty',
        //     'middle_name' => 'Lopez',
        //     'last_name' => 'Orendain',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457847',
        //     'grade_level' => '11',
        //     'first_name' => 'Russel Kyle',
        //     'middle_name' => 'Lopez',
        //     'last_name' => 'Orendain',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457848',
        //     'grade_level' => '11',
        //     'first_name' => 'Romel Jayson',
        //     'middle_name' => 'Tapia',
        //     'last_name' => 'Orozco',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457849',
        //     'grade_level' => '11',
        //     'first_name' => 'Mark Anthony',
        //     'middle_name' => 'Pila',
        //     'last_name' => 'Pacamo',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457850',
        //     'grade_level' => '11',
        //     'first_name' => 'Jake',
        //     'middle_name' => 'Rico',
        //     'last_name' => 'Padolina',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457851',
        //     'grade_level' => '11',
        //     'first_name' => 'Geymar',
        //     'middle_name' => 'Coy',
        //     'last_name' => 'Pagallamman',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457852',
        //     'grade_level' => '11',
        //     'first_name' => 'Ryan Paul',
        //     'middle_name' => 'Asuru',
        //     'last_name' => 'Palanca',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457853',
        //     'grade_level' => '11',
        //     'first_name' => 'Eiymhar',
        //     'middle_name' => 'Mass',
        //     'last_name' => 'Patricio',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457854',
        //     'grade_level' => '11',
        //     'first_name' => 'Roemiel',
        //     'middle_name' => 'Boa',
        //     'last_name' => 'Salamanes',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457855',
        //     'grade_level' => '11',
        //     'first_name' => 'Charles',
        //     'middle_name' => 'Rambles',
        //     'last_name' => 'Valenzuela',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457856',
        //     'grade_level' => '11',
        //     'first_name' => 'Kenneth',
        //     'middle_name' => 'Bautista',
        //     'last_name' => 'Villarosa',
        //     'gender' => 'male',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457857',
        //     'grade_level' => '11',
        //     'first_name' => 'Dianne',
        //     'middle_name' => 'Telon',
        //     'last_name' => 'Amora',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457858',
        //     'grade_level' => '11',
        //     'first_name' => 'Jamille Vic',
        //     'middle_name' => 'Meca',
        //     'last_name' => 'Antimo',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457859',
        //     'grade_level' => '11',
        //     'first_name' => 'Jennylyn Mae',
        //     'middle_name' => 'Dela',
        //     'last_name' => 'Arcede',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457860',
        //     'grade_level' => '11',
        //     'first_name' => 'Lori Mel',
        //     'middle_name' => 'Bose',
        //     'last_name' => 'Bacton',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457861',
        //     'grade_level' => '11',
        //     'first_name' => 'Claire',
        //     'middle_name' => 'Orile',
        //     'last_name' => 'Buenaobra',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457862',
        //     'grade_level' => '11',
        //     'first_name' => 'Avril Reign',
        //     'middle_name' => 'Cat',
        //     'last_name' => 'De Leon',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457863',
        //     'grade_level' => '11',
        //     'first_name' => 'Wenalyn',
        //     'middle_name' => 'Lip',
        //     'last_name' => 'Esquilona',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457864',
        //     'grade_level' => '11',
        //     'first_name' => 'Anne Pauline',
        //     'middle_name' => 'Ampit',
        //     'last_name' => 'Molina',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457865',
        //     'grade_level' => '11',
        //     'first_name' => 'Florence Gel',
        //     'middle_name' => 'Lim',
        //     'last_name' => 'Morilla',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457866',
        //     'grade_level' => '11',
        //     'first_name' => 'Aireen',
        //     'middle_name' => 'Ambas',
        //     'last_name' => 'Mostoles',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457867',
        //     'grade_level' => '11',
        //     'first_name' => 'Rhealyn',
        //     'middle_name' => 'Rim',
        //     'last_name' => 'Nodalo',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457868',
        //     'grade_level' => '11',
        //     'first_name' => 'Diana Elizabeth',
        //     'middle_name' => 'Puz',
        //     'last_name' => 'Opida',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457869',
        //     'grade_level' => '11',
        //     'first_name' => 'Julia Rose',
        //     'middle_name' => 'Luno',
        //     'last_name' => 'Quillope',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457870',
        //     'grade_level' => '11',
        //     'first_name' => 'Thricia Mae',
        //     'middle_name' => 'Bam',
        //     'last_name' => 'Recaña',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457871',
        //     'grade_level' => '11',
        //     'first_name' => 'Lunalyn',
        //     'middle_name' => 'Tor',
        //     'last_name' => 'Riño',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);

        // $student = Student::create([
        //     'lrn' => '10923457872',
        //     'grade_level' => '11',
        //     'first_name' => 'Laira',
        //     'middle_name' => 'Ruma',
        //     'last_name' => 'Verzo',
        //     'gender' => 'female',
        // ]);

        // $student->section(36)->associate(2);
        // $student->strand(5)->associate(1);
        // $student->save();

        // AdviserClearance::create([
        //     'student_id' => $student->id
        // ]);




    }
}
