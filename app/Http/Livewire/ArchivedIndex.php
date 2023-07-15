<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pass;
class ArchivedIndex extends Component
{
    public $search;
    public function render()
    {
        $passes = Pass::whereHas('user', function ($query) {
            $query->where('name', 'LIKE' , '%'.$this->search.'%');
            })
            ->where('estado', 4)
            ->paginate();
        return view('livewire.archived-index', compact('passes'));
    }
}
