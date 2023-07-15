<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use App\Models\Pass;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',);
    }
    public function reporte()
    {
        $passes = Pass::all();
        $pdf = PDF::setPaper('a4', 'landscape')->loadview('passes.reporte',compact('passes'));
        return $pdf->stream();
    }
}
