<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('site.pages.home.index');
    }

    public function aboutUs()
    {
        return view('site.pages.about-us');
    }

    public function managementPlans()
    {
        return view('site.pages.management-plans');
    }

    public function contactUs()
    {
        return view('site.pages.contact-us');
    }

    public function propertyListing()
    {
        return view('site.pages.property-listing');
    }

    public function propertyPage()
    {
        return view('site.pages.property-page');
    }

    public function faq()
    {
        return view('site.pages.faq');
    }

    public function termsAndConditions()
    {
        return view('site.pages.terms-and-condition');
    }

    public function privacyPolicy()
    {
        return view('site.pages.privacy-policy');
    }
}
