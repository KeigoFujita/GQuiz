<?php

namespace App\Http\Controllers;

use App\ClassClearance;
use App\Employee;
use App\Role;
use App\SchoolClass;
use App\Section;
use App\Subject;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('class.index')->with('classes', SchoolClass::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employee = new Employee();
        $teachers = $employee->teachers();
        return view('class.create')->with([

            'teachers' => $teachers,
            'subjects' => Subject::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_code' => 'required|unique:school_classes',
            'class_schedule' => 'required',
        ]);


        SchoolClass::create([
            'class_code' => $request->class_code,
            'employee_id' => auth()->user()->employee->id,
            'subject_id' => $request->subject_id ?? null,
            'schedule' => $request->class_schedule
        ]);

        session()->flash('success', 'Class created successfully.');
        return redirect(route('teachers.my-classes'));
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
    public function edit(SchoolClass $class)
    {
        $schoolClass = $class;
        $school_class_id = $schoolClass->id;
        $school_class = SchoolClass::with('sections','class_requirements')->where('id',$school_class_id)->first();
        $school_class_subject = $school_class->subject;
        $school_class_employee = $school_class->employee;
        
        //Reassigning clearance for new students if there are any
        foreach ($schoolClass->class_requirements as $key => $requirement) {
            $class = SchoolClass::find($requirement->school_class->id);

            $student_ids = $class->students->pluck('id');


            //deleting all 
            $clearances = ClassClearance::where('class_requirement_id', $requirement->id)
                ->whereNotIn('student_id', $student_ids)
                ->get()
                ->pluck('id')
                ->toArray();

            ClassClearance::destroy($clearances);

            foreach ($class->students as $key => $student) {

                $student_clearance = ClassClearance::where('student_id', $student->id)
                    ->where('class_requirement_id', $requirement->id)->get();
                if ($student_clearance->count() == 0) {
                    $student_clearance = new ClassClearance();
                    $student_clearance->student_id = $student->id;
                    $student_clearance->class_requirement_id = $requirement->id;
                    $student_clearance->save();

                    // echo "Student is " . $student->full_name . "<br>";
                }
            }
        }


        $teachers = Employee::teachers();
        return view('class.edit')->with([

            'teachers' => $teachers,
            'subjects' => Subject::all(),
            'sections' => Section::all(),
            'school_class' => $school_class,
            'school_class_subject' => $school_class_subject,
            'school_class_employee'=>$school_class_employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $class)
    {

        $schoolClass = $class;
        $request->validate([
            'class_code' => 'required|unique:school_classes,class_code,' . $schoolClass->id,
            'class_schedule' => 'required',
        ]);




        $data = $request->only(['class_code', 'employee_id', 'subject_id']);

        $schoolClass->update($data);

        $schoolClass->schedule = $request->class_schedule;
        $schoolClass->save();

        session()->flash('success', 'Class updated successfully.');
        return redirect(route('schoolClass.edit', $schoolClass));
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
}