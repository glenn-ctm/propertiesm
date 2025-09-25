<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyOwnerController extends Controller
{
    public function dashboard()
    {
        return view('templates.panel.property-owner.dashboard');
    }

    public function myAccountView()
    {
        return view('templates.panel.property-owner.my-account.view');
    }

    public function myAccountEdit()
    {
        return view('templates.panel.property-owner.my-account.edit');
    }

    public function progressSheetView()
    {
        return view('templates.panel.property-owner.progress-sheet.view');
    }

    public function progressSheetShow()
    {
        return view('templates.panel.property-owner.progress-sheet.show');
    }

    public function requestAQuote()
    {
        return view('templates.panel.property-owner.request-a-quote.index');
    }

    public function paymentDetails()
    {
        return view('templates.panel.property-owner.payment.details');
    }

    public function paymentConfirm()
    {
        return view('templates.panel.property-owner.payment.confirm');
    }

    public function paymentSuccess()
    {
        return view('templates.panel.property-owner.payment.success');
    }

    public function vidRecPic()
    {
        return view('templates.panel.property-owner.vid-rec-pic.view');
    }

    public function properties()
    {
        return view('templates.panel.property-owner.properties.view');
    }


}
