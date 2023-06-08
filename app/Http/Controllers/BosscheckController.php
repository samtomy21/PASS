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
}
