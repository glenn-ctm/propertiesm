<?php

namespace App\View\Components\Stepper;

use App\Http\Livewire\Payment\Models\Stepper;
use Illuminate\View\Component;

class Progress extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Stepper $steps)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.stepper.progress');
    }
}
