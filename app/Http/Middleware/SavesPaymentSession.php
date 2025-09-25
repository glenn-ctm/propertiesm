<?php

namespace App\Http\Middleware;

use App\Services\PaymentSessionService;
use App\Traits\ContextualLogger;
use Closure;
use Illuminate\Http\Request;

class SavesPaymentSession
{
    use ContextualLogger;

    public function __construct(public PaymentSessionService $service)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $was = auth()->check();
        
        return tap($next($request), function () use ($was) {

            // If the auth state transitioned, we should not save to prevent the session sharing
            if (auth()->check() !== $was) {
                return;
            }
            
            $this->service->save();
        });
    }
}
