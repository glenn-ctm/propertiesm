<?php

namespace App\Exceptions\Payment;

use App\Models\Payment;
use Exception;

class AlreadyChargedException extends Exception
{
    public function __construct(string $message = 'Payment has already been charged.', public ?Payment $payment = null)
    {
        parent::__construct($message);
    }

    public function context()
    {
        return ['payment_id' => $this->payment?->getKey()];
    }
}
