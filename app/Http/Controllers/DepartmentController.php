<?php

namespace App\Http\Controllers;

use App\Department;
use App\DepartmentClearance;
use App\DepartmentRequirement;
use App\Employee;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Role;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index')
            ->with('departments', Department::all()->except(1))
            ->with('employees', Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create')->with('employees', Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        $request->flash();

        $department = Department::create([
            'department_name' => $request->department_name
        ]);

        Role::create([
            'role_name' => $request->role_name,
            'department_id' => $department->id
        ]);

        session()->flash('success', 'Department created successfully.');
        return redirect(route('departments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.edit')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request)
    {
        $department_id = $request->department_id;
        $department = Department::find($department_id);
        $department->department_name = $request->department_name;
        $department->save();

        session()->flash('success', 'Department updated successfully.');
        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $department = Department::findOrFail($request->department_id);

        if ($department->role()->count() > 0) {
            session()->flash('error', 'Cannot delete department that is used.');
            return redirect(route('departments.index'));
        } else {
            $department->delete();
            session()->flash('success', 'Department deleted successfully.');
            return redirect(route('departments.index'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clearances(DepartmentRequirement $departmentRequirement)
    {
        $requirement = DepartmentRequirement::with('department')->find($departmentRequirement->id);
        $clearances  = $requirement->department_clearances;
        return view('department.clearances')->with('requirement', $requirement)->with('department_clearances',$clearances);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_clearance(Request $request)
    {

        $clearance_id = $request->clearance_id;
        $status = $request->status;

        $clearance = DepartmentClearance::find($clearance_id);
        $clearance->status = $status;
        $clearance->save();

        //echo "$clearance_id" . "| $status";

        return response('Updated Successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makeAllComplete(Request $request, DepartmentRequirement $departmentRequirement)
    {
        $ids = $request->ids_to_complete;
        $array = explode(',', $ids);


        $class_clearances_to_update = DepartmentClearance::whereIn('id', $array)
            ->update([
                'status' => 'complete'
            ]);

        return redirect(route('departments.clearances', $departmentRequirement));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makeAllUnComplete(Request $request, DepartmentRequirement $departmentRequirement)
    {
        $ids = $request->ids_to_uncomplete;
        $array = explode(',', $ids);

        //dd($request->all());
        $class_clearances_to_update = DepartmentClearance::whereIn('id', $array)
            ->update([
                'status' => 'incomplete'
            ]);

        // dd($class_clearances_to_update);
        // User::where('id', 24)->update (dataAssociativeArray) ;

        //  dd($request->all());
        // route('departments.clearances', )
        return redirect(route('departments.clearances', $departmentRequirement));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function department_head(Employee $employee)
    {

        // dd($employee);
        $department = $employee->roles->first()->department;

        // dd($department);
        return view('department.department_head')->with('department', $department);
    }

    /**
     * Search the department using query string
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = Str::of($request->search)->lower();
        // $departments = Department::where('department_name', 'LIKE', "%" . $query . "%")->get();
        $departments = Department::select('id', 'department_name')->get()->except(1);
        $filtered_data = collect($departments)->map(function ($item) use ($query) {

            if (
                Str::contains(Str::of($item->department_name)->lower(), $query) ||
                Str::contains(Str::of($item->role->assigned_officer->full_name)->lower(), $query) ||
                Str::contains(Str::of($item->role->role_name)->lower(), $query)
            ) {
                return [
                    $item->id,
                    $item->department_name,
                    $item->role->assigned_officer->full_name,
                    $item->role->role_name
                ];
            }
            return null;
        })->filter(function ($value) {
            return !is_null($value);
        });

        return response()->json($filtered_data);
    }
}
