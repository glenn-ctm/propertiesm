<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyListingRegistration extends Controller
{

    public function __invoke(Request $request)
    {
        if( auth()->check() ){
            return redirect()->route('site-properties.index');
        }

        return view('site.pages.property-listing-registration', [
            'registrationTypes' => [ "one_time", "tenant", "property_owner" ]
        ]);
    }

}
