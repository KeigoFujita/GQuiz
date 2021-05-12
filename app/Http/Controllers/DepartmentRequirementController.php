<?php

namespace App\Http\Controllers;

use App\Department;
use App\DepartmentClearance;
use App\DepartmentRequirement;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentRequirementController extends Controller
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
        // dd($request->all());

        $request->validate([
            'requirement' => 'required',
            'description' => 'required',
            'deadline'    => 'required'
        ]);

        $requirement = DepartmentRequirement::create([
            'requirement_description' => $request->description,
            'requirement' => $request->requirement,
            'deadline' => $request->deadline,
            'department_id' => $request->department
        ]);


        $students = Student::all();


        foreach ($students as $key => $student) {
            DepartmentClearance::create([
                'student_id' => $student->id,
                'department_requirement_id' => $requirement->id
            ]);
        }




        session()->flash('success', 'Requirement created successfully.');
        $department = Department::find($request->department);
        if (Auth::user()->role == 'employee') {
            if (Auth::user()->employee->is_registrar == false) {
                return redirect(route('departments.department_head', $department->role->assigned_officer));
            }
        }

        return redirect(route('departments.edit', $request->department));
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
        //dd($request->all());


        $request->validate([
            'requirement' => 'required',
            'description' => 'required',
            'deadline'    => 'required'
        ]);

        //dd($request->all());

        $data = $request->only(['requirement', 'description', 'deadline']);
        $requirement = DepartmentRequirement::find($request->requirement_id);

        $requirement->requirement_description  = $request->description;
        $requirement->department_id = $request->department;
        $requirement->update($data);
        $requirement->save();


        session()->flash('success', 'Requirement updated successfully.');

        $department = Department::find($request->department);
        if (Auth::user()->role == 'employee') {
            if (Auth::user()->employee->is_registrar == false) {
                return redirect(route('departments.department_head', $department->role->assigned_officer));
            }
        }

        return redirect(route('departments.edit', $request->department));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());

        $requirement = DepartmentRequirement::find($request->requirement_id);
        $department = $requirement->department;



        $students = Student::all();


        foreach ($students as $key => $student) {
            $clearance = DepartmentClearance::where([
                'student_id' => $student->id,
                'department_requirement_id' => $requirement->id
            ]);
            $clearance->delete();
        }


        $requirement->delete();


        session()->flash('success', 'Requirement deleted successfully.');

        if (Auth::user()->role == 'employee') {
            if (Auth::user()->employee->is_registrar == false) {
                return redirect(route('departments.department_head', $department->role->assigned_officer));
            }
        }


        return redirect(route('departments.edit', $requirement->department));
    }
}