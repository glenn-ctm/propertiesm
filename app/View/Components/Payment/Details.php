<?php

namespace App\View\Components\Payment;

use App\Models\Payment;
use Illuminate\View\Component;

class Details extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?Payment $payment, public string $clientSecret)
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
        return view('components.payment.details');
    }
}
