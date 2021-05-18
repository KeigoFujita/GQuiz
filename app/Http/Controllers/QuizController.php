<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function search_term(Request $request){

        $query = $request->input('query');

       $response = Http::withHeaders([
            'Cookie' => '__cf_bm=aad7f235bdd2f818adf575600e8fdfa6bd80aee5-1621364471-1800-AdQb4lCJOlNB5w8TGPCo2DGHeDbv+iLFsscUVL9YI6rjvYc9w5qood2qLwoUD3i1/vHfgEbUXZDnL6VU+uisW3k=; app_session_id=7e4f8de3-f3b3-4eeb-9d7b-c86cace934be; fs=qtbfex; qi5=1x3bkovmhz9mb%3AMbiA7S2J9qvjNhHmAoSB; qtkn=uNX9RNWU4wyG3sfMNwPxcg',
            'User-Agent'=> 'PostmanRuntime/7.28.0'
        ])->get('https://quizlet.com/webapi/3.2/suggestions/definition?clientId=-6179229827316476521&limit=3&word='.$query.'&defLang=en&localTermId=-1&prefix=&wordLang=en');

        return view('teacher.quizzes.items.result-set')
            ->with('results',collect(json_decode($response->body())->responses[0]->data->suggestions->suggestions)->pluck('text'));

    }
}
