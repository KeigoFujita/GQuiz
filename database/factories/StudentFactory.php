<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use App\Student;
use Faker\Generator as Faker;

$sections = Section::select('id','strand_id')->inRandomOrder()->get();

$factory->define(Student::class, function (Faker $faker) use ($sections) {
    $section = $faker->randomElement($sections);
    return [
        'lrn' => $faker->unique()->numerify($string = '############'),
        'grade_level' => $faker->randomElement(['11','12']),
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['male','female']),
        'section_id'=> $section->id,
        'strand_id'=> $section->strand->id
    ];
});
