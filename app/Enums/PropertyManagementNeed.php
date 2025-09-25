<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PropertyManagementNeed extends Enum
{
    // const RentCollection    = 'Rent Collection';
    // const TenantOccupancy   = 'Tenant Occupancy';
    // const Evictions         = 'Evictions';
    // const MonthlyStatements = 'Monthly Statements';
    const RentCollection = 'Rent Collection';
    const TenantOccupancy = 'Tenant Occupancy';
    const Evictions = 'Evictions';
    const MonthlyStatements = 'Monthly Statements';
    const ProjectManagement = 'Project Management';
    const PropertyManagement = 'Property Management';
    const FullPropertyMaintenance = 'Full Property Maintenance';
    const Reporting = 'Reporting';
    const APPAccessMonitoring = 'APP Access & Monitoring';
}
