<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pass;




class PassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('passes.index', [
            'passes' => $request->user()->passes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pass $pass)
    {
        $request->validate([
            'charge_id' => 'required',
            'dependence_id' => 'required',
            'ncard' => 'required',
            'name' => 'required',
            'motive' => 'required',
            'place' => 'required',
            'observation'=> 'required',
            'time' => 'required',
            'input' => 'required',
            'output' => 'required',
            'date' => 'required',
        ]);
        
        $request->user()->passes()->create($request->all());

        return redirect()->route('passes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pass $pass)
    {
        $request->validate([
            'charge_id' => 'required',
            'dependence_id' => 'required',
            'ncard' => 'required',
            'name' => 'required',
            'motive' => 'required',
            'place' => 'required',
            'observation'=> 'required',
            'time' => 'required',
            'input' => 'required',
            'output' => 'required',
            'date' => 'required',
        ]);

        if($request->user()->id != $pass->user_id)
        {
            abort(403);
        }

        $pass->update($request->all());
        return redirect()->route('passes.edit', $pass);
        
    }

    public function destroy(Request $request, Pass $pass)
    {
        $pass->delete();

        if($request->user()->id != $pass->user_id)
        {
            abort(403);
        }
        
        return redirect()->route('passes.index');
    }
}
