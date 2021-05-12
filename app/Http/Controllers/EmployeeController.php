<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Role;
use App\Semester;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index')->with('employees', Employee::where('status','active')->orderBy('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create')->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {

        //dd($request->all());

        $request->flash();

        $employee = Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender
        ]);
        
        $teacher_role = Role::where('role_name','teacher')->first();        
        $employee->roles()->attach([$teacher_role->id]);
        
        session()->flash('success', 'Teacher added successfully.');
        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit')->with('employee', $employee)->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {

        $data = $request->only(['first_name', 'middle_name', 'last_name', 'mobile_number', 'gender']);

        // $employee->roles()->sync($request->roles);
        $employee->update($data);
        $employee->save();

        session()->flash('success', 'Teacher updated successfully.');
        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->status = 'inactive';
        $employee->save();
        
        session()->flash('success', 'Teacher deleted successfully.');
        return redirect(route('teachers.index'));
    }
}