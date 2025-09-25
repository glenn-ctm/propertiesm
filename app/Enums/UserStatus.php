<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const VERIFY    = 'Verify';
    const UNVERIFY  = 'Unverify';
}
