<?php

namespace App\Http\Controllers;

use App\Employee;
use App\SchoolClass;
use App\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = new Employee();
        $teachers = $employees->teachers();
        return view('teacher.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function my_students(Employee $employee)
    {

        return view('teacher.my_students')
            ->with('students', $employee->students);
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
            'students'=> $students
        ]);
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

    public function my_classes_invite_student(SchoolClass $schoolClass, Student $student)
    {   
        $teacher = auth()->user()->employee;

        $classes = $teacher->schoolClasses;

        if(!$classes->contains('id',$schoolClass->id)){
            abort(403,"Unauthorized");
        }

        if ($schoolClass->students->contains('id',$student->id)){
            session()->flash('danger', 'Student is already in the class.');
            return redirect(route('teachers.my-classes-show',$schoolClass));
        }

        $schoolClass->students()->attach($student->id);
        $schoolClass->save();

        session()->flash('success', 'Student invited successfully!');
        return redirect(route('teachers.my-classes-show',$schoolClass));
    }

    public function search_student(Request $request)
    {   
        $query = $request->get('query') ?? '';
        $class = SchoolClass::find($request->class);

        if (!$query || $query === null ||strlen($query) === 0 ){
            return response('<div class="card"><div class="card-body"><div class="d-flex justify-content-center align-items-center"><p class="mb-0">No student found.</p></div></div></div>');
        }else if(strlen($query) < 3){
            return response('<div class="card"><div class="card-body"><div class="d-flex justify-content-center align-items-center"><p class="mb-0">Please search atleast 3 characters...</p></div></div></div>');
        }

        $students = Student::query()
                        ->where('first_name','LIKE','%'.$query.'%')
                        ->orWhere('last_name','LIKE','%'.$query.'%')
                        ->orWhere('lrn','LIKE','%'.$query.'%')
                        ->get()->take(5);

        return view('teacher.result-set',[
            'students'=> $students,
            'class'=> $class
        ]);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'class_code'=> $request->class_code,
            'schedule'=> $request->class_schedule
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