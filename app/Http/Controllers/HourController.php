<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use App\Models\Pass;
use App\Models\Hour;
class HourController extends Controller
{
    public function index(){

        return view('hours.index',);
    }
    public function archivar(Request $request, Pass $pass){

        $sign = Pass::find($request->id);
        $firm = $sign->estado + 1;
        $sign->estado = $firm;
        $sign->save();

        return redirect()->route('hours.index');
    }


}
