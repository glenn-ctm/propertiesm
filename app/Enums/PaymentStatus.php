<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PaymentStatus extends Enum
{
    const Pending = 'pending';
    const Success = 'success';
    const Failed  = 'failed';
}
