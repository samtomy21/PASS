<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\Dependence;
use App\Models\User;

use App\Models\Pass;

class CreateModal extends Component
{
    public $open = false;
    public function render(Request $request, Pass $pass)
    {
        $charges = Charge::all();
        $dependences = Dependence::all();
        $users = User::all();

        return view('livewire.create-modal', compact('charges', 'dependences', 'users'));
    }
}
