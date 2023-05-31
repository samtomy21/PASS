<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsercheckController extends Controller
{
    public function index(){

       return view('userchecks.index', [
            'passes' => auth()
                        ->user()
                        ->passes()
                        ->where('estado', 1)
                        ->get(),
       ]);
    }
}
