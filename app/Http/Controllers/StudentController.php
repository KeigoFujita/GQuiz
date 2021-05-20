<?php

namespace App\Http\Controllers;

use App\AdviserClearance;
use App\ClassClearance;
use App\Department;
use App\DepartmentClearance;
use App\DepartmentRequirement;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Requests\SubmitQuizFormRequest;
use App\Item;
use App\Quiz;
use App\Role;
use App\SchoolClass;
use App\Section;
use App\Strand;
use App\Student;
use Facade\FlareClient\Http\Response;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =  Student::with('section','strand')->where('status','active')->get();
        return view('student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create')->with('strands', Strand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {

        $request->flash();


        $student = Student::create([
            'lrn' => $request->lrn,
            'grade_level' => $request->grade_level,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'section_id' => $request->section ?? null,
            'strand_id' => $request->strand
        ]);


        AdviserClearance::create([
            'student_id' => $student->id
        ]);

        // dd($request->all());
        // $student->strand()->associate($request->strand);
        // $student->save();

        session()->flash('success', 'Student added successfully.');
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     *
     * @param Student $student
     * @return View
     */
    public function show(Student $student) : View
    {

        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];

        return view('student.show')->with([
            'student' => $student,
            'classes' => $student->classes,
            'colors' => $colors
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit')->with('student', $student)->with('strands', Strand::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $request->flash();
        $student->fill([
            'lrn' => $request->lrn,
            'grade_level' => $request->grade_level,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
        ]);

        $student->section()->associate($request->section);
        $student->strand()->associate($request->strand);
        $student->save();
        session()->flash('success', 'Student updated successfully.');
        return redirect(route('students.edit', $student));
    }


    public function clearance(Student $student)
    {
        $department_clearances = Department::with('role')->get()->except(1)->map(function($department) use ($student){
            $department_requirements = DepartmentRequirement::where('department_id',$department->id)->get();
            $department_requirements->map(function($requirement) use ($student, $department){
                $no_of_incomplete = DepartmentClearance::where('student_id',$student->id)
                ->where('department_requirement_id',$requirement->id)
                ->where('status','incomplete')
                ->count();
                $department->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';

                $completion_date = DepartmentClearance::where('department_requirement_id',$requirement->id)
                ->where('student_id',$student->id)
                ->max('updated_at');
                $department->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;

            });
            if($department_requirements->count() == 0) {
                $department->status = 'complete';
                $department->completion_date =  now()->format('m-d-Y');
            }
            return $department;
        });

        $adviser_clearance = AdviserClearance::where('student_id',$student->id)->first();

        $subject_clearances = $student->section->school_classes->map(function($class) use ($student){
            $requirements = $class->class_requirements;
            $requirements->each(function($requirement) use ($class, $student){
                $no_of_incomplete = ClassClearance::where('student_id',$student->id)
                ->where('class_requirement_id',$requirement->id)
                ->where('status','incomplete')
                ->count();

                $class->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';

                $completion_date = ClassClearance::where('class_requirement_id',$requirement->id)
                ->where('student_id',$student->id)
                ->max('updated_at');
                $class->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
            });
            if($requirements->count() == 0) {
                $class->status = 'complete';
                $class->completion_date =  now()->format('m-d-Y');
            }
            return $class;
        });


        $registrar = Role::where('role_name','registrar')->first();
        $registrar_name = "N/A";
        if(isset($registrar)){
            $registrar_name = $registrar->assigned_officer->full_name;
        }
        return view('student.clearance')
            ->with('student',$student)
            ->with('department_clearances',$department_clearances)
            ->with('subject_clearances',$subject_clearances)
            ->with('registrar_name',$registrar_name)
            ->with('adviser_clearance',$adviser_clearance);
    }

    public function clearanceToPDF(Student $student)
    {
        $department_clearances = Department::with('role')->get()->except(1)->map(function($department) use ($student){
            $department_requirements = DepartmentRequirement::where('department_id',$department->id)->get();
            $department_requirements->map(function($requirement) use ($student, $department){
                $no_of_incomplete = DepartmentClearance::where('student_id',$student->id)
                ->where('department_requirement_id',$requirement->id)
                ->where('status','incomplete')
                ->count();
                $department->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';

                $completion_date = DepartmentClearance::where('department_requirement_id',$requirement->id)
                ->where('student_id',$student->id)
                ->max('updated_at');
                $department->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;

            });
            if($department_requirements->count() == 0) {
                $department->status = 'complete';
                $department->completion_date =  now()->format('m-d-Y');
            }
            return $department;
        });

        $adviser_clearance = AdviserClearance::where('student_id',$student->id)->first();

        $subject_clearances = $student->section->school_classes->map(function($class) use ($student){
            $requirements = $class->class_requirements;
            $requirements->each(function($requirement) use ($class, $student){
                $no_of_incomplete = ClassClearance::where('student_id',$student->id)
                ->where('class_requirement_id',$requirement->id)
                ->where('status','incomplete')
                ->count();

                $class->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';

                $completion_date = ClassClearance::where('class_requirement_id',$requirement->id)
                ->where('student_id',$student->id)
                ->max('updated_at');
                $class->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
            });
            if($requirements->count() == 0) {
                $class->status = 'complete';
                $class->completion_date =  now()->format('m-d-Y');
            }
            return $class;
        });

        $registrar = Role::where('role_name','registrar')->first();
        $registrar_name = "N/A";
        if(isset($registrar)){
            $registrar_name = $registrar->assigned_officer->full_name;
        }

         $pdf = PDF::loadView('student.clearance-pdf',[
             'student'=>$student,
             'department_clearances'=>$department_clearances,
             'registrar_name'=>$registrar_name,
             'adviser_clearance'=>$adviser_clearance,
             'subject_clearances'=>$subject_clearances
         ]);

         return $pdf->download(strtoupper($student->full_name). ' - CLEARANCE'.'.pdf');
    }

    public function printClearance(Student $student)
    {
        $department_clearances = Department::with('role')->get()->except(1)->map(function($department) use ($student){
            $department_requirements = DepartmentRequirement::where('department_id',$department->id)->get();
            $department_requirements->map(function($requirement) use ($student, $department){
                $no_of_incomplete = DepartmentClearance::where('student_id',$student->id)
                ->where('department_requirement_id',$requirement->id)
                ->where('status','incomplete')
                ->count();
                $department->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';

                $completion_date = DepartmentClearance::where('department_requirement_id',$requirement->id)
                ->where('student_id',$student->id)
                ->max('updated_at');
                $department->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;

            });
            if($department_requirements->count() == 0) {
                $department->status = 'complete';
                $department->completion_date =  now()->format('m-d-Y');
            }
            return $department;
        });

        $adviser_clearance = AdviserClearance::where('student_id',$student->id)->first();

        $subject_clearances = $student->section->school_classes->map(function($class) use ($student){
            $requirements = $class->class_requirements;
            $requirements->each(function($requirement) use ($class, $student){
                $no_of_incomplete = ClassClearance::where('student_id',$student->id)
                ->where('class_requirement_id',$requirement->id)
                ->where('status','incomplete')
                ->count();

                $class->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';

                $completion_date = ClassClearance::where('class_requirement_id',$requirement->id)
                ->where('student_id',$student->id)
                ->max('updated_at');
                $class->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
            });
            if($requirements->count() == 0) {
                $class->status = 'complete';
                $class->completion_date =  now()->format('m-d-Y');
            }
            return $class;
        });


        $registrar = Role::where('role_name','registrar')->first();
        $registrar_name = "N/A";
        if(isset($registrar)){
            $registrar_name = $registrar->assigned_officer->full_name;
        }

         $pdf = PDF::loadView('student.clearance-pdf',[
             'student'=>$student,
             'department_clearances'=>$department_clearances,
             'registrar_name'=>$registrar_name,
             'adviser_clearance'=>$adviser_clearance,
             'subject_clearances'=>$subject_clearances
         ]);

         return $pdf->stream(strtoupper($student->full_name). ' - CLEARANCE'.'.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getsection(Request $request)
    {
        $section = Section::select("id", "section_name AS text")->where('grade_level', $request->grade_level)->where('strand_id', $request->strand_id)->get();
        // $section = Section::where('grade_level', '12')->where('strand_id', '1')->get();
        return  response()->json($section->toJson(), 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->status = 'dropped';
        $student->save();

        session()->flash('success', 'Student deleted successfully.');
        return redirect(route('students.index'));
    }

    public function my_classes(SchoolClass $schoolClass)
    {
        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];
        $quizzes = $schoolClass->quizzes()->where('status','active')->get();
        $members = $schoolClass->students;

        return view('student.my_classes.index',[
           'class'=>$schoolClass,
           'colors'=>$colors,
           'quizzes'=>$quizzes,
           'members'=> $members
        ]);
    }

    public function take_quiz(Quiz $quiz)
    {
        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];
        $items = $quiz->items()->inRandomOrder()->get();

        if($quiz->is_expired){
            session()->flash('danger', 'This quiz has expired. Please contact your professor for more info');
            return redirect(route('students.my-classes', $quiz->schoolClass));
        }

        if(Auth::user()->student->quizzes->contains('id',$quiz->id)){
            session()->flash('danger', 'You already take this quiz!');
            return redirect(route('students.my-classes', $quiz->schoolClass));
        }

        if($quiz->type === "enumeration"){
            return view('quizzes.take-quiz.enumeration')
                ->with('quiz',$quiz)
                ->with('items',$items)
                ->with('colors',$colors);
        }else{

            $questions = $items->map(function($item) use ($items){
                $answer = $item->term;
                $id = $item->id;
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
                    'answer'=> $answer,
                    'id'=> $id,
                ];
            });

            return view('quizzes.take-quiz.multiple_choice')
                ->with('quiz',$quiz)
                ->with('questions',$questions)
                ->with('colors',$colors);
        }
    }

    public function submit_quiz(SubmitQuizFormRequest $request, Quiz $quiz)
    {
        $score = 0;
        foreach ($request->input('ids') as $index => $id){
            $item = Item::findOrFail($id);
            $answer = $item->term;
            $student_answer = $request->input('answers')[$index];
            if(Str::lower($student_answer) === Str::lower($answer)){
                $score++;
            }
        }
        $student = Auth::user()->student;
        $student->quizzes()->attach($quiz->id,[
            'score' => $score
        ]);

        session()->flash('success', 'Thank you for your response.');
        return redirect(route('students.my-classes', $quiz->schoolClass));
    }

    public function submit_quiz_radio(Request $request, Quiz $quiz)
    {
        $request->validate([
            'answers'=> 'required|array|between:'.$quiz->items->count().','.$quiz->items->count()
        ]);

        $score = 0;
        foreach ($request->input('ids') as $index => $id){
            $item = Item::findOrFail($id);
            $answer = $item->term;
            $student_answer = $request->input('answers')[$index];
            if(Str::lower($student_answer) === Str::lower($answer)){
                $score++;
            }
        }
        $student = Auth::user()->student;
        $student->quizzes()->attach($quiz->id,[
            'score' => $score
        ]);

        session()->flash('success', 'Thank you for your response.');
        return redirect(route('students.my-classes', $quiz->schoolClass));
    }
}
