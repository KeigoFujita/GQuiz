<?php

namespace App\Http\Controllers;

use App\ClassClearance;
use App\ClassRequirement;
use App\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SchoolClassSection;

class ClassRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd(Auth::user()->role == 'employee');
        $request->validate([
            'requirement' => 'required',
            'description' => 'required',
            'deadline'    => 'required'
        ]);

        $requirement = ClassRequirement::create([
            'requirement_description' => $request->description,
            'requirement' => $request->requirement,
            'deadline' => $request->deadline,
            'school_classes_id' => $request->class
        ]);

        $class = SchoolClass::find($request->class);

        $student_clearances = $class->students->map(function($student) use ($requirement){
            return[
            'student_id'=>$student->id,
            'class_requirement_id' => $requirement->id,
            ];
        })->toArray();
        //  dd($student_clearances);

        ClassClearance::insert($student_clearances);

        // foreach ($class->students as $key => $student) {
        //     $student_clearance = new ClassClearance();
        //     $student_clearance->student_id = $student->id;
        //     $student_clearance->class_requirement_id = $requirement->id;
        //     $student_clearance->save();
        // }

        session()->flash('success', 'Requirement created successfully.');

        if (Auth::user()->role == 'employee') {
            if (Auth::user()->employee->is_teacher) {
                return redirect(route('teachers.schoolClass', $request->class));
            }
        }
        return redirect(route('schoolClass.edit', $class));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ClassRequirement $classRequirement)
    {
        return view('class.clearances')->with('requirement', $classRequirement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'requirement' => 'required',
            'description' => 'required',
            'deadline'    => 'required'
        ]);

        //dd($request->all());

        $data = $request->only(['requirement', 'description', 'deadline']);
        $requirement = ClassRequirement::find($request->requirement_id);

        $requirement->requirement_description  = $request->description;
        $requirement->school_classes_id = $request->class;
        $requirement->update($data);
        $requirement->save();



        session()->flash('success', 'Requirement updated successfully.');

        if (Auth::user()->role == 'employee') {
            if (Auth::user()->employee->is_teacher) {
                return redirect(route('teachers.schoolClass', $request->class));
            }
        }
        return redirect(route('schoolClass.edit', $request->class));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $requirement = ClassRequirement::find($request->requirement_id);
        $clearances = ClassClearance::where('class_requirement_id', $requirement->id)->get();

        foreach ($clearances as $key => $clearance) {
            $clearance->delete();
        }

        $requirement->delete();
        session()->flash('success', 'Requirement deleted successfully.');

        if (Auth::user()->role == 'employee') {
            if (Auth::user()->employee->is_teacher) {
                return redirect(route('teachers.schoolClass', $requirement->school_class));
            }
        }

        return redirect(route('schoolClass.edit', $requirement->school_class));
    }
}