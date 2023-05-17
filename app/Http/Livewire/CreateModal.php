<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Pass;

use App\Models\Charge;
use App\Models\Dependence;
use App\Models\User;

class CreateModal extends Component
{
    public $open = false;
    public function render(Request $request, Pass $pass)
    {
        $date = Carbon::now();
        // $charges = Charge::all();
        // $dependences = Dependence::all();
        // $users = User::all();
        //return dd($date);

        // return view('livewire.create-modal', compact('date', 'pass', 'charges', 'dependences', 'users'));
        return view('livewire.create-modal', compact('date'));
    }
}
