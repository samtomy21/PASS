<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Pass;


class BosscheckController extends Controller
{
    public function index(Request $request){

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
}
