<?php

namespace App\View\Components\Payment;

use App\Models\Payment;
use Illuminate\View\Component;

class Success extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Payment $payment)
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
        return view('components.payment.success');
    }
}
