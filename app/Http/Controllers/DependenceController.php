<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dependence;

class DependenceController extends Controller
{
    public function index(Request $request)
    {
        
        return view('dependences.index',[
            'dependences' => Dependence::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_dependence' => 'required'
        ]);

        Dependence::create($request->all());

        return redirect()->route('dependences.index');
    }

    public function edit(Request $request, Dependence $dependence)
    {
        return view('dependences.edit', compact('dependence'));
    }

    public function update(Request $request, Dependence $dependence)
    {
        $request->validate([
            'name_dependence' => 'required',
        ]);

        $dependence->update($request->all());

        return redirect()->route('dependences.index', $dependence);
    }

    public function destroy(Request $request, Dependence $dependence)
    {
        $dependence->delete();

        return redirect()->route('dependences.index');
    }
}
