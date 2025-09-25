<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OneTimeUserController extends Controller
{

    public function paymentDetails()
    {
        return view('panel.pages.one-time-user.payment.details');
    }

    public function paymentConfirm()
    {
        return view('panel.pages.one-time-user.payment.confirm');
    }

    public function paymentSuccess()
    {
        return view('panel.pages.one-time-user.payment.success');
    }


}
