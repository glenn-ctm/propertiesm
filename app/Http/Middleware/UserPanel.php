<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\UserType;

class UserPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if( is_null($user) ) {
            abort(404);
        }

        if( $user->type() === UserType::REGULAR ) {
            abort(404);
        }

        if( !$user->hasVerifiedEmail() ) {
            abort(401);
        }

        return $next($request);
    }
}
