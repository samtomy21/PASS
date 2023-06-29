<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pass;
use App\Models\Return_time;
use Carbon\Carbon;

class ReturnTimeController extends Controller
{


    public function assing_return_time(Request $request, Pass $pass){
        $pase = Pass::find($request->id);
        $id = $pase->id;
        $currentHour = Carbon::now()->format('H:i:s');
        return view('hours.asignarHoraRetorno', compact('currentHour', 'pase'));
    }

    public function return_hour_store(Request $request, Pass $pass){

        Return_time::create($request->all());
        // return $hour;
        return redirect()->route('hours.index');
    }
}
