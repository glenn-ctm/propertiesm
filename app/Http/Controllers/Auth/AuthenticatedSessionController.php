<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('site.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if($redirect = $request->input('redirect')){
            return redirect( parse_url($redirect, PHP_URL_PATH) );
        }

        if( 
            auth()->user()->is_property_owner() ||
            auth()->user()->is_tenant() ||
            auth()->user()->is_admin() ||
            auth()->user()->is_super_admin()
        ) {
            if (auth()->user()->is_tenant()) {
                return redirect('panel/repair-requests');
            }
            return redirect('panel/dashboard');
        }

        // temporary redirection page for regular users 
        return redirect('one-time-user/payment/details');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
