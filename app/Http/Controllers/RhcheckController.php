<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RhcheckController extends Controller
{
    public function index(){

        return view('userchecks.index', [
             'passes' => auth()
                         ->user()
                         ->passes()
                         ->where('estado', 3)
                         ->get(),
        ]);
     }
}
