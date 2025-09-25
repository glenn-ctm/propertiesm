<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use App\Models\RepairRequest;
use App\Enums\RepairRequestStatus;
use App\Models\Property;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if( auth()->user()->is_tenant() ) {
            return redirect('panel/repair-requests');
            return view('panel.pages.dashboard.tenant', [
                'name' => auth()->user()->name
            ]);
        }

        if( auth()->user()->is_property_owner() ) {
            return view('panel.pages.dashboard.property-owner', [
                'total_ongoing_request' => auth()->user()->repair_requests()->where('status', RepairRequestStatus::ONGOING)->count(),
                'total_completed_request' => auth()->user()->repair_requests()->where('status', RepairRequestStatus::COMPLETED)->count(),
                'total_properties' => auth()->user()->properties()->count(),
            ]);
        }

        $properties = Property::has('tenants')->withCount('tenants')->get();
        return view('panel.pages.dashboard.admin', [
            'total_ongoing_request' => RepairRequest::where('status', RepairRequestStatus::ONGOING)->count(),
            'total_completed_request' => RepairRequest::where('status', RepairRequestStatus::COMPLETED)->count(),
            'total_properties' => Property::count(),
            'total_onetime_users' => User::regular()->count(),
            'total_tenants' => User::tenants()->count(),
            'total_property_owners' => User::propertyOwners()->count(),
        ]);
    }
}
