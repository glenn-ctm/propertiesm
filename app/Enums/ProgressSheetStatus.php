<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProgressSheetStatus extends Enum
{
    const PENDING   = 'Pending';
    const ONGOING   = 'Ongoing';
    const COMPLETED = 'Completed';
}
