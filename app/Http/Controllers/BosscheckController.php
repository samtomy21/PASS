<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Pass;


class BosscheckController extends Controller
{
    public function index(Request $request){

        $dep = $request->user()->dependence_id;

        $passes = Pass::whereHas('user', function ($query) use ($dep){
            $query->where('dependence_id', $dep);
            })
            ->where('estado', 1)
            ->paginate(5);

        return view('bosschecks.index', compact('passes'));
    }

    public function firmarBoss(Request $request, Pass $pass)
    {
        $sign = Pass::find($request->id);
        $firm = $sign->estado + 1;
        $sign->estado = $firm;
        $sign->save();

        return redirect()->route('bosscheck.index');
    }

    public function corregirBoss(Request $request, Pass $pass)
    {
        $sign = Pass::find($request->id);
        $correct = $sign->estado - 1 ;
        $sign->estado = $correct;
        $sign->save();

        return redirect()->route('bosscheck.index');
    }
}
