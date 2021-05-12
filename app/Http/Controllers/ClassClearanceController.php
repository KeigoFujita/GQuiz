<?php

namespace App\Http\Controllers;

use App\ClassClearance;
use App\ClassRequirement;
use Illuminate\Http\Request;

class ClassClearanceController extends Controller
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
        $clearance_id = $request->clearance_id;
        $status = $request->status;

        $clearance = ClassClearance::find($clearance_id);
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
    public function makeAllComplete(Request $request)
    {
        $ids = $request->ids_to_complete;
        $array = explode(',', $ids);


        $class_clearances_to_update = ClassClearance::whereIn('id', $array)
            ->update([
            'status' => 'complete'
            ]);

        // dd($class_clearances_to_update);
        // User::where('id', 24)->update (dataAssociativeArray) ;

        //  dd($request->all());
        return redirect(route('classRequirements.show', ClassRequirement::find($request->requirement_id)));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makeAllUnComplete(Request $request)
    {

        $ids = $request->ids_to_uncomplete;
        $array = explode(',', $ids);

        //dd($request->all());
        $class_clearances_to_update = ClassClearance::whereIn('id', $array)
            ->update([
                'status' => 'incomplete'
            ]);

        // dd($class_clearances_to_update);
        // User::where('id', 24)->update (dataAssociativeArray) ;

        //  dd($request->all());

        return redirect(route('classRequirements.show', ClassRequirement::find($request->requirement_id)));
    }
}