<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                if($redirect = $request->input('redirect')){
                    return redirect( parse_url($redirect, PHP_URL_PATH) );
                }

                if( 
                    auth()->user()->is_property_owner() ||
                    auth()->user()->is_tenant() ||
                    auth()->user()->is_admin() ||
                    auth()->user()->is_super_admin()
                ) {
                    return redirect('panel/dashboard');
                }
        
                // temporary redirection page for regular users 
                return redirect('one-time-user/payment/details');
            }
        }

        return $next($request);
    }
}
