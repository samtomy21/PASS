<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\User;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $users = User::where('name', 'LIKE' , '%'.$this->search.'%')
            ->orwhere('email', 'LIKE', '%'.$this->search.'%')
            ->paginate();
        
        return view('livewire.users-index', compact('users'));
    }
}
