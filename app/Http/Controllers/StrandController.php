<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStrandRequest;
use App\Http\Requests\UpdateStrandRequest;
use App\Strand;
use Illuminate\Http\Request;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('strand.index')->with('strands', Strand::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('strand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStrandRequest $request)
    {
        $request->flash();

        Strand::create([
            'strand_name' => $request->strand_name,
            'strand_description' => $request->strand_description
        ]);

        session()->flash('success', 'Strand added successfully.');
        return redirect(route('strands.index'));
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
    public function edit(Strand $strand)
    {
        return view('strand.edit')->with('strand', $strand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStrandRequest $request, Strand $strand)
    {
        $data = $request->only(['strand_name', 'strand_description']);

        $strand->update($data);
        $strand->save();

        session()->flash('success', 'Strand updated successfully.');
        return redirect(route('strands.index'));
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