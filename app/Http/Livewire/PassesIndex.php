<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pass;
use Illuminate\Http\Request;

class PassesIndex extends Component
{
    public $search;

    public function render(Request $request)
    {
        return view('livewire.passes-index',[
            'passes' => auth()
                        ->user()
                        ->passes()
                        ->where('motive', 'LIKE' , '%'.$this->search.'%')
                        ->paginate(5),
        ]);
    }
}
