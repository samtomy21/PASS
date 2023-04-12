<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Charge;

class ChargeController extends Controller
{
    public function index(Request $request)
    {
        
        return view('charges.index',[
            'charges' => Charge::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_charge' => 'required'
        ]);

        Charge::create($request->all());

        return redirect()->route('charges.index');
    }

    public function edit(Request $request, Charge $charge)
    {
        return view('charges.edit', compact('charge'));
    }

    public function update(Request $request, Charge $charge)
    {
        $request->validate([
            'name_charge' => 'required',
        ]);

        $charge->update($request->all());

        return redirect()->route('charges.index', $charge);
    }

    public function destroy(Request $request, Charge $charge)
    {
        $charge->delete();

        return redirect()->route('charges.index');
    }
}
