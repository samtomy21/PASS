<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
class TimeController extends Controller
{
    public function index(Request $request)
    {
        
        return view('times.index',[
            'times' => Time::latest('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_permision' => 'required'
        ]);

        Time::create($request->all());

        return redirect()->route('times.index');
    }

    public function edit(Request $request, Time $time)
    {
        return view('charges.edit', compact('time'));
    }

    public function update(Request $request, Time $time)
    {
        $request->validate([
            'time_permision' => 'required',
        ]);

        $time->update($request->all());

        return redirect()->route('times.index', $time);
    }

    public function destroy(Request $request, Time $time)
    {
        $time->delete();

        return redirect()->route('times.index');
    }
}
