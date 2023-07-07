<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pass;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ArchivedController extends Controller
{
    public function index(){
        return view('archived.index', [
            'passes' => Pass::where('estado', 4)
                        ->get(),
        ]);
    }

    public function show(Request $request, Pass $pass){
        $pass = Pass::find($request->id);
        return view('archived.show', compact('pass'));
    }

    public function reporte(Request $request)
    {
        $pdf = PDF::setPaper('a4', 'landscape')->loadview('passes.reporte',[
            'passes' => Pass::where('estado', 4)
            ->get(),
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
