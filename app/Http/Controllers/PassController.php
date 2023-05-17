<?php
namespace App\Http\Livewire;
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Livewire\Component;
use App\Models\Charge;
use App\Models\Dependence;
use App\Models\User;

use App\Models\Pass;




class PassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('passes.index', [
            'passes' => auth()->user()->passes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $charges = Charge::all();
        $dependences = Dependence::all();
        $users = User::all();

        return view('passes.create', compact('charges', 'dependences', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pass $pass)
    {
        $request->validate([
            'charge_id' => 'required',
            'dependence_id' => 'required',
            'motive' => 'required',
            'place' => 'required',
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
    public function show(Request $request, Pass $pass)
    {
        if($request->user()->id != $pass->user_id)
        {
            abort(403);
        }

        //return dd(compact('pass'));
        return view('passes.show', compact('pass'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pass $pass)
    {
        if($request->user()->id != $pass->user_id)
        {
            abort(403);
        }

        $charges = Charge::all();
        $dependences = Dependence::all();
        $users = User::all();

        return view('passes.edit', compact('pass', 'charges', 'dependences', 'users'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pass $pass)
    {
        $request->validate([
            'charge_id' => 'required',
            'dependence_id' => 'required',
            'motive' => 'required',
            'place' => 'required',
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
        return redirect()->route('passes.index', $pass);
        
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

    public function deleteAll(Request $request){
        $ids = $request->ids;
        Pass::whereIn('id', $ids)->delete();
        return response()->json(["success" => "Las Papeletas de Permisos han sido Eliminados!"]);
    }

    public function reporte(Request $request)
    {
        $pdf = PDF::setPaper('a4', 'landscape')->loadview('passes.reporte',[
            'passes' => auth()->user()->passes
        ]);
        return $pdf->stream();
    }
    
    public function print(Request $request, Pass $pass)
    {   
        
        $pdf = PDF::loadview('passes.pdf', [
            'pass' => Pass::find($request->id)
        ]);

        return $pdf->stream();
    
    }
}