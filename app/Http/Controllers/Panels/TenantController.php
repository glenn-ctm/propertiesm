<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function maintenanceRepair()
    {
        return view('templates.panel.tenant.maintenance-repair.index');
    }

    public function paymentDetails()
    {
        return view('templates.panel.tenant.payment.details');
    }

    public function paymentConfirm()
    {
        return view('templates.panel.tenant.payment.confirm');
    }

    public function paymentSuccess()
    {
        return view('templates.panel.tenant.payment.success');
    }

    public function dashboard()
    {
        return view('templates.panel.tenant.dashboard');
    }

}
