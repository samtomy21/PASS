<?php

namespace App\Http\Livewire;
use App\Models\Pass;
use Livewire\Component;
use Illuminate\Http\Request;

class BossIndex extends Component
{
    public $search;
    public function render(Request $request)
    {
        $dep = $request->user()->dependence_id;
        $passes = Pass::whereHas('user', function ($query) {
            $query->where('name', 'LIKE' , '%'.$this->search.'%');
            })
                ->whereHas('user', function ($query) use ($dep){
                $query->where('dependence_id', $dep);
                })
                ->where('estado', 1)
                ->latest()
                ->paginate();
        return view('livewire.boss-index', compact('passes'));
    }
}
