<?php

namespace App\Http\Livewire\Site\Components;

use Livewire\Component;

class LoggedinFormDetails extends Component
{
    public $user;

    public function mount($user = null) {
        if ($user === null) {
            $this->user = auth()->user();
        } else {
            $this->user = $user;
        }
    }

    public function render()
    {
        return view('livewire.site.components.loggedin-form-details');
    }
}
