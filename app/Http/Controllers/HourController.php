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
            'passes' => Pass::where('estado', 4)
                        ->get(),
        ]);
    }


}
