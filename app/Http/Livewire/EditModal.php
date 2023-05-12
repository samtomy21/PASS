<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Charge;
use App\Models\Dependence;
use App\Models\User;


use App\Models\Pass;

class EditModal extends Component
{
    public $pass;
    public $open = false;
    
    public function mount(Pass $pass){
        $this->pass = $pass;
    }
    public function render(Request $request, Pass $pass)
    {   
        //para el modal editar
        $charges = Charge::all();
        $dependences = Dependence::all();
        $users = User::all();
        
        return view('livewire.edit-modal', compact('pass', 'charges', 'dependences', 'users'));  
        // return view('livewire.edit-modal', compact('pass'));  
    }
    
    
     
}
