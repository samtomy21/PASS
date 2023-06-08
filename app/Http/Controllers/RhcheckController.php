<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pass;

class RhcheckController extends Controller
{
    public function index(){

        return view('userchecks.index', [
             'passes' => Pass::where('estado', 3)
                        ->get(),
        ]);
     }
}
