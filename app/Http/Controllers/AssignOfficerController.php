<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignOfficerController extends Controller
{
    public function __invoke(Request $request)
    {

        $department = Department::find($request->department_id);

        if ($request->employee_id == 'none') {

            if (isset($department->role->assigned_officer)) {

                if (Auth::user()->employee->id == $department->role->assigned_officer->id) {
                    session()->flash('error', 'Cannot remove role for existing user.');
                    return redirect(route('departments.index.blade.php'));
                }
                $assigned_officer = $department->role->assigned_officer;
                $assigned_officer->roles()->detach($department->role->id);
                session()->flash('success', 'Removed Assigned Officer Successfuly.');
            }
            return redirect(route('departments.index.blade.php'));
        } else {
            $employee = Employee::find($request->employee_id);
        }



        if (!isset($employee)) {
            session()->flash('error', 'Cannot find the employee.');
            return redirect(route('departments.index.blade.php'));
        }

        if (!isset($department)) {
            session()->flash('error', 'Cannot find the department.');
            return redirect(route('departments.index.blade.php'));
        }

        $role_id = $department->role->id;
        if ($department->role->assigned_officer) {
            $department->role->assigned_officer->roles()->detach($role_id);
        }
        $employee->roles()->attach($role_id);
        session()->flash('success', 'Officer Assigned Successfuly.');
        return redirect(route('departments.index.blade.php'));
    }
}
