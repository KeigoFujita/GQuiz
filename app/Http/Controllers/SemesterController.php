<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemesterStoreRequest;
use App\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = new Semester();
        $has_latest = $semester->has_latest_semester;
        return view('semester.index')->with('semesters', Semester::orderBy('end_date', 'desc')->get())->with('has_latest', $has_latest);
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
    public function store(SemesterStoreRequest $request)
    {
        $request->flash();

        //  dd($request->all());

        $start_year = $request->start_year;
        $end_year = $request->end_year;
        $semester = $request->semester;

        $semester_code = "SY-" . substr($start_year, 2, 2) . "-" . substr($end_year, 2, 2) . "-" . $semester;
        // dd($semester_code);

        if (!Semester::where('semester_code', '=', $semester_code)->exists()) {
            Semester::create([
                'semester_code' => $semester_code,
                'start_year' => $start_year,
                'end_year' => $end_year,
                'semester' => $semester,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            session()->flash('success', 'The semester started successfully');
        } else {
            session()->flash('error', 'The semester already exists.');
        }

        return redirect(route('semesters.index.blade.php'));
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
