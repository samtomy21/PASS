<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pass;
class RhIndex extends Component
{
    public $search;
    public function render()
    {
        $passes = Pass::whereHas('user', function ($query) {
            $query->where('name', 'LIKE' , '%'.$this->search.'%');
            })
            ->where('estado', 2)
            ->latest()
            ->paginate();
        return view('livewire.rh-index', compact('passes'));
    }
}
