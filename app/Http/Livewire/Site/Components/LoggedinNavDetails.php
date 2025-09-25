<?php

namespace App\Http\Livewire\Site\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoggedinNavDetails extends Component
{
    public $user;

    public function mount() {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.site.components.loggedin-nav-details');
    }
}
