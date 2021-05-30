<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Item;
use App\Quiz;
use App\SchoolClass;
use App\Strand;
use App\Student;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $employees = new Employee();
        $teachers = $employees->teachers()->take(7);
        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];
        return view('teacher.index5 ')
            ->with('teachers', $teachers)
            ->with('colors', $colors);
    }

    public function my_classes()
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];

        return view('teacher.index_classes',[
            'teacher'=> $teacher,
            'classes'=> $classes,
            'colors' => $colors
        ]);
    }

    public function my_classes_archived()
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClassesArchived;

        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];

        return view('teacher.index_classes_archived',[
            'teacher'=> $teacher,
            'classes'=> $classes,
            'colors' => $colors
        ]);
    }

    public function my_classes_show(SchoolClass $schoolClass)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id) || $schoolClass->status === 'archived'){
            abort(403,"Unauthorized");
        }

        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];

        $students = $schoolClass->students;

        return view('teacher.show_classes',[
            'class'=> $schoolClass,
            'colors' => $colors,
            'students'=> $students,
            'active' => 'students'
        ]);
    }

    public function quizzes_store(Request $request, SchoolClass $schoolClass)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'expires_at' => 'required|after:now'
        ]);

        $schoolClass->quizzes()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'expires_at' => $request->input('expires_at'),
        ]);

        session()->flash('success', 'Quiz created successfully.');
        return redirect(route('teachers.my-classes-show',$schoolClass));

    }

    public function quizzes_update(Request $request, SchoolClass $schoolClass, Quiz $quiz)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'expires_at' => 'required|after:now',
            'type'=> 'in:enumeration,multiple_choice'
        ]);

        $quiz->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'expires_at' => $request->input('expires_at'),
            'type' => $request->input('type'),
        ]);

        session()->flash('success', 'Quiz updated successfully.');
        return redirect(route('teachers.quizzes-show',[$schoolClass, $quiz]));

    }

    public function quizzes_publish(SchoolClass $schoolClass, Quiz $quiz)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        if($quiz->items()->count() === 0){
            session()->flash('danger', 'Unable to publish quiz with no question.');
            return redirect(route('teachers.quizzes-show',[$schoolClass, $quiz]));
        }

        $quiz->status = 'active';
        $quiz->save();

        session()->flash('success', 'Quiz published successfully.');
        return redirect(route('teachers.quizzes-show',[$schoolClass, $quiz]));

    }

    public function quizzes_archive(SchoolClass $schoolClass, Quiz $quiz)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $quiz->status = 'archived';
        $quiz->save();

        session()->flash('success', 'Quiz archived successfully.');
        return redirect(route('teachers.quizzes-show',[$schoolClass, $quiz]));

    }

    public function quizzes_show(SchoolClass $schoolClass, Quiz $quiz)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];

        $students = $schoolClass->students;
        $strands = Strand::all();

        return view('teacher.quizzes.show',[
            'students'=> $students,
            'class' => $schoolClass,
            'quiz' => $quiz,
            'colors'=> $colors,
            'strands' => $strands
        ]);

    }

    public function quizzes_create_definition(Request $request, SchoolClass $schoolClass, Quiz $quiz)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        $quiz->items()->create([
            'term'=> $request->input('term'),
            'definition'=> $request->input('definition'),
        ]);

        session()->flash('success', 'Definition created successfully.');
        return redirect(route('teachers.quizzes-show',[$schoolClass,$quiz]));

    }


    /**
     * @param SchoolClass $schoolClass
     * @param Quiz $quiz
     * @param Item $item
     * @return RedirectResponse
     * @throws Exception
     */
    public function quizzes_delete_definition(SchoolClass $schoolClass, Quiz $quiz, Item $item) : RedirectResponse
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $item->delete();

        session()->flash('success', 'Definition deleted successfully.');
        return redirect(route('teachers.quizzes-show',[$schoolClass,$quiz]));

    }

    public function quizzes_update_definition(Request $request, SchoolClass $schoolClass, Quiz $quiz)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $item = Item::findOrFail($request->input('item_id'));

        $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        $item->update([
            'term'=> $request->input('term'),
            'definition'=> $request->input('definition'),
        ]);

        session()->flash('success', 'Definition updated successfully.');
        return redirect(route('teachers.quizzes-show',[$schoolClass,$quiz]));

    }

    public function my_classes_remove_student(SchoolClass $schoolClass, Student $student)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }
        $schoolClass->students()->detach($student->id);
        $schoolClass->save();

        return redirect(route('teachers.my-classes-show',$schoolClass));
    }

    public function my_classes_invite_student(Request $request, SchoolClass $schoolClass)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $schoolClass->students()->attach($request->input('students'));
        $schoolClass->save();

        session()->flash('success', 'Students invited successfully!');
        return redirect(route('teachers.my-classes-show',$schoolClass));
    }

    public function check_student(Request $request, SchoolClass $schoolClass): JsonResponse
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        if ($schoolClass->students->contains('id',$request->input('student_id'))){
            return response()->json([
                'status'=> 'unauthorized'
            ]);
        }

        return response()->json([
            'status'=> 'authorized'
        ]);

    }

    public function search_student(Request $request)
    {
        $query = $request->get('query') ?? '';
        $class = SchoolClass::find($request->input('class'));

        if (!$query ||strlen($query) === 0 ){
            return response('<div class="card"><div class="card-body"><div class="d-flex justify-content-center align-items-center"><p class="mb-0">No student found.</p></div></div></div>');
        }else if(strlen($query) < 3){
            return response('<div class="card"><div class="card-body"><div class="d-flex justify-content-center align-items-center"><p class="mb-0">Please search at least 3 characters...</p></div></div></div>');
        }

        $students = Student::query()
                        ->where('first_name','LIKE','%'.$query.'%')
                        ->orWhere('last_name','LIKE','%'.$query.'%')
                        ->orWhere('lrn','LIKE','%'.$query.'%')
                        ->get()->take(10);

        return view('teacher.result-set',[
            'students'=> $students,
            'class'=> $class
        ]);

    }


    public function school_class(SchoolClass $class)
    {
        return view('teacher.class_requirement')->with('school_class', $class);
    }

    public function my_classes_update(Request $request, SchoolClass $schoolClass)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $request->validate([
            'class_code' => 'required|unique:school_classes,class_code,' . $schoolClass->id,
            'class_schedule' => 'required',
        ]);

        $schoolClass->update([
            'class_code'=> $request->input('class_code'),
            'schedule'=> $request->input('class_schedule'),
        ]);

        session()->flash('success', 'Class updated  successfully.');

        return redirect(route('teachers.my-classes-show',$schoolClass));
    }

    public function my_classes_archive(SchoolClass $schoolClass)
    {
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $schoolClass->status = 'archived';
        $schoolClass->save();

        session()->flash('success', 'Class archived  successfully.');

        return redirect(route('teachers.my-classes'));
    }

    public function my_classes_restore(SchoolClass $schoolClass)
    {
        $teacher = auth()->user()->employee;

        $classes = SchoolClass::where('employee_id', $teacher->id)->get();

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        $schoolClass->status = 'active';
        $schoolClass->save();

        session()->flash('success', 'Class restored  successfully.');

        return redirect(route('teachers.my-classes'));
    }
}
