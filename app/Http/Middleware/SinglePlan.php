<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SinglePlan
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
        // abort_if(auth()->user()->resume->profession, 402, 'To create another CV please upgrade your plan!');
        return $next($request);
    }
}
