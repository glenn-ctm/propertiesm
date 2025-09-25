<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{
    const SUPER_ADMIN    = 'Super Administrator';
    const ADMIN          = 'Administrator';
    const PROPERTY_OWNER = 'Property Owner';
    const TENANT         = 'Tenant';
    const REGULAR        = 'Regular';
}
