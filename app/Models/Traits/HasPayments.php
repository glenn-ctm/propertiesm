<?php

namespace App\Models\Traits;

use App\Models\Payment;

trait HasPayments
{
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
