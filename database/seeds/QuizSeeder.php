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
            'description' => 'Please review about the part of speech. Pay attention on the key terms. Good luck on your quiz!',
            'expires_at' => now()->addDay()
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

        $quiz->items()->create([
            'term'=> 'Anaphora',
            'definition'=> 'A technique where several phrases or verses begin with the same word or words.'
        ]);

        $quiz->items()->create([
            'term'=> 'Assonance',
            'definition'=> "Repetition of vowel sounds (not just letters) in words that are close together. The sounds don't have to be at the beginning of the word."
        ]);

        $quiz->items()->create([
            'term'=> 'Euphemism',
            'definition'=> "A mild, indirect, or vague term that often substitutes a harsh, blunt, or offensive term."
        ]);

        $quiz->items()->create([
            'term'=> 'Irony',
            'definition'=> "Occurs when there's a marked contrast between what is said and what is meant, or between appearance and reality."
        ]);

    }
}
