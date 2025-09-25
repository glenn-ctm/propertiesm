<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserType extends Enum
{
    const SUPER_ADMIN    = 'SA';
    const ADMIN          = 'AD';
    const PROPERTY_OWNER = 'PO';
    const TENANT         = 'TN';
    const REGULAR        = 'RU';
}
