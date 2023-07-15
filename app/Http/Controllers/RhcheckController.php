<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pass;

class RhcheckController extends Controller
{
    public function index(){

        return view('rhchecks.index');
    }

    public function firmarRh(Request $request, Pass $pass)
    {
        $sign = Pass::find($request->id);
        $firm = $sign->estado + 1;
        $sign->estado = $firm;
        $sign->save();

        return redirect()->route('rhcheck.index');
    }
}
