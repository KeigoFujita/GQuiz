<?php

use App\SchoolClass;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = SchoolClass::query()->first();
        $quiz = $class->quizzes()->create([
            'name' => 'Preliminary Quiz',
            'description' => 'Please review about the part of speech.'
        ]);

        $quiz->items()->create([
            'term'=> 'Simile',
            'definition'=> 'A figure of speech involving the comparison of one thing with another thing of a different kind, used to make a description more emphatic or vivid'
        ]);

        $quiz->items()->create([
            'term'=> 'Hyperbole',
            'definition'=> 'Exaggerated statements or claims not meant to be taken literally.'
        ]);

        $quiz->items()->create([
            'term'=> 'Personification',
            'definition'=> 'The attribution of a personal nature or human characteristics to something nonhuman, or the representation of an abstract quality in human form.'
        ]);

    }
}
