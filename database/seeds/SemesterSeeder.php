<?php

use App\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'semester_code' => 'SY-16-17-1',
            'start_year' => '2016',
            'end_year' => '2017',
            'semester' => '1',
            'start_date' => '2016-06-06',
            'end_date' => '2016-10-28',
            'status' => 'completed'
        ]);

        Semester::create([
            'semester_code' => 'SY-16-17-2',
            'start_year' => '2016',
            'end_year' => '2017',
            'semester' => '2',
            'start_date' => '2016-11-07',
            'end_date' => '2016-4-28',
            'status' => 'completed'
        ]);

        Semester::create([
            'semester_code' => 'SY-17-18-1',
            'start_year' => '2017',
            'end_year' => '2018',
            'semester' => '1',
            'start_date' => '2017-06-06',
            'end_date' => '2017-10-28',
            'status' => 'completed'
        ]);

        Semester::create([
            'semester_code' => 'SY-17-18-2',
            'start_year' => '2017',
            'end_year' => '2018',
            'semester' => '2',
            'start_date' => '2017-11-07',
            'end_date' => '2018-4-28',
            'status' => 'completed'
        ]);


        Semester::create([
            'semester_code' => 'SY-18-19-1',
            'start_year' => '2018',
            'end_year' => '2018',
            'semester' => '1',
            'start_date' => '2018-06-06',
            'end_date' => '2018-10-28',
            'status' => 'completed'
        ]);

        Semester::create([
            'semester_code' => 'SY-18-19-2',
            'start_year' => '2018',
            'end_year' => '2019',
            'semester' => '2',
            'start_date' => '2018-11-07',
            'end_date' => '2019-4-28',
            'status' => 'completed'
        ]);

        Semester::create([
            'semester_code' => 'SY-19-20-1',
            'start_year' => '2019',
            'end_year' => '2020',
            'semester' => '1',
            'start_date' => '2019-06-06',
            'end_date' => '2019-10-28',
            'status' => 'completed'
        ]);

        Semester::create([
            'semester_code' => 'SY-19-20-2',
            'start_year' => '2019',
            'end_year' => '2020',
            'semester' => '2',
            'start_date' => '2019-11-07',
            'end_date' => '2020-4-28'
        ]);
    }
}