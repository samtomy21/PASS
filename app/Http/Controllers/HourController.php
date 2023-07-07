<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pass;
use App\Models\Hour;
class HourController extends Controller
{
    public function index(){

        return view('hours.index', [
            'passes' => Pass::where('estado', 3)
                        ->get(),
        ]);
    }
    public function archivar(Request $request, Pass $pass){

        $sign = Pass::find($request->id);
        $firm = $sign->estado + 1;
        $sign->estado = $firm;
        $sign->save();

        return redirect()->route('hours.index');
    }


}
