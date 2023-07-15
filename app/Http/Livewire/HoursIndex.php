<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pass;
class HoursIndex extends Component
{
    public $search;
    public function render()
    {
        $passes = Pass::whereHas('user', function ($query) {
            $query->where('name', 'LIKE' , '%'.$this->search.'%');
            })
            ->where('estado', 3)
            ->paginate();
        return view('livewire.hours-index', compact('passes'));
    }
}
