<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PropertyMaintenance extends Enum
{
    // const InteriorUpkeepComplete = 'Interior Upkeep Complete';
    // const ExteriorUpkeepComplete = 'Exterior Upkeep Complete';
    // const LandscapingComplete    = 'Landscaping Complete';
    const Plumbing = 'Plumbing';
    const Electrical = 'Electrical';
    const Carpentry = 'Carpentry';
    const Drywall = 'Drywall';
    const Painting = 'Painting';
    const Doors = 'Doors';
    const Windows = 'Windows';
    const Flooring = 'Flooring';
    const Roofing = 'Roofing';
    const NewBuilds = 'New Builds';
    const AddOns = 'Add Ons';
    const JADUs = 'JADUs';
    const ADUs = 'ADUs';
    const Hardscaping = 'Hardscaping';
    const Softscaping = 'Softscaping';
}
