<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pass;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ArchivedController extends Controller
{
    public function index(){


        return view('archived.index');
    }

    public function show(Request $request, Pass $pass){
        $pass = Pass::find($request->id);
        return view('archived.show', compact('pass'));
    }

    public function reporte()
    {
        $passes = Pass::where('estado', 4)->get();
        $pdf = PDF::setPaper('a4', 'landscape')->loadview('archived.reporte',compact('passes'));
        return $pdf->stream();
    }

    public function print(Request $request, Pass $pass)
    {

        $pdf = PDF::loadview('archived.pdf', [
            'pass' => Pass::find($request->id)
        ]);

        return $pdf->stream();

    }
}
