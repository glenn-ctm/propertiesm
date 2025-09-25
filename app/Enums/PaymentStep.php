<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Details()
 * @method static static Confirm()
 * @method static static Success()
 */
final class PaymentStep extends Enum
{
    const Details = 0;
    const Confirm = 1;
    const Success = 2;

    public function toArray()
    {
        return [
            'key'         => $this->key,
            'value'       => $this->value,
            'description' => $this->description,
        ];
    }
}
