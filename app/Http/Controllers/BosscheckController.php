<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pass;


class BosscheckController extends Controller
{
    public function index(Request $request){

        $dep = $request->user()->dependence_id;

        return view('bosschecks.index', [
            'passes' => Pass::whereHas('user', function ($query) use ($dep){
                        $query->where('dependence_id', $dep);
                        })
                        ->where('estado', 2)
                        ->get(),
        ] );
    }

    public function firmarBoss(Request $request, Pass $pass)
    {
        $sign = Pass::find($request->id);
        $firm = $sign->estado + 1;
        $sign->estado = $firm;
        $sign->save();

        return redirect()->route('bosscheck.index');
    }
}
