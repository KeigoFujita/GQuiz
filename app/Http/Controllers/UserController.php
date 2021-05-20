<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index')->with([
            'students' => Student::with('section','strand','user')->get(),
            'employees' => Employee::with('user','roles')->get()
        ]);
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
        //  dd($request->all());
        $request->validate([
            'email' => 'required|unique:users',
        ]);

        $account_type = $request->account_type;
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            'name' => 'N/A',
            'email' => $email,
            'role' => $account_type,
            'password' => Hash::make($password)
        ]);

        if ($account_type == 'student') {
            $student = Student::find($request->student_id);
            $student->user_id = $user->id;
            $student->save();
        } else {
            $employee = Employee::find($request->employee_id);
            $employee->user_id = $user->id;
            $employee->save();
        }

        session()->flash('success', 'Account is created successfully.');
        return redirect(route('users.index'));
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
}
