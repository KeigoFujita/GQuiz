<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::doesntHave('role')->get()->except(1);
        return view('role.index')
            ->with('roles', Role::all())
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create')->with('departments', Department::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $request->flash();
        $department_id = $request->department_id;

        if ($request->department_id == 'none') {
            $department = Department::where('department_name', 'none')->first();
            $department_id = $department->id;
        }

        Role::create([
            'role_name' => $request->role_name,
            'department_id' => $department_id
        ]);

        session()->flash('success', 'Role added successfully.');
        return redirect(route('roles.index'));
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
    public function edit(Role $role)
    {
        return view('role.edit')->with('role', $role)->with('departments', Department::all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request)
    {

        $role = Role::findOrFail($request->role_id);
        $data = $request->only(['role_name']);

        $department_id = $request->department_id;

        if ($request->department_id == 'none') {
            $department = Department::where('department_name', 'none')->first();
            $department_id = $department->id;
        }
        $role->department_id = $department_id;
        $role->update($data);
        $role->save();

        session()->flash('success', 'Role updated successfully.');
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->employees()->count() > 0) {
            session()->flash('error', 'Cannot delete role that is used.');
            return redirect(route('roles.index'));
        } else {
            $role->delete();
            session()->flash('success', 'Role deleted successfully.');
            return redirect(route('roles.index'));
        }
    }
}