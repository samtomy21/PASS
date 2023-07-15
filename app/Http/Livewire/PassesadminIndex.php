<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pass;
class PassesadminIndex extends Component
{
    public $search;
    public function render()
    {
        $passes = Pass::whereHas('user', function ($query) {
            $query->where('name', 'LIKE' , '%'.$this->search.'%');
            })
            ->paginate();
        return view('livewire.passesadmin-index', compact('passes'));
    }
}
