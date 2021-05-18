<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function preview(Quiz $quiz){
        $this->checkIfOwner($quiz);

        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];
        $items = $quiz->items()->inRandomOrder()->get();
        if($quiz->type === "enumeration"){
            return view('quizzes.preview.enumeration')
                ->with('quiz',$quiz)
                ->with('items',$items)
                ->with('colors',$colors);
        }else{

            $questions = $items->map(function($item) use ($items){
                $answer = $item->term;
                $choices = $items->filter(function($item) use ($answer){
                    return $item->term !== $answer;
                })->pluck('term')
                    ->shuffle()
                    ->take(3)
                    ->add($answer)
                    ->shuffle()
                    ->toArray();
                return [
                    'question'=> $item->definition,
                    'choices'=> $choices,
                    'answer'=> $answer
                ];
            });

            return view('quizzes.preview.multiple_choice')
                ->with('quiz',$quiz)
                ->with('questions',$questions)
                ->with('colors',$colors);
        }

    }

    private function checkIfOwner(Quiz $quiz){
        $teacher = auth()->user()->employee;
        $classes = $teacher->schoolClasses;
        abort_if(!$classes->contains($quiz->schoolClass),403);
    }
}
