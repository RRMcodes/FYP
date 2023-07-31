<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Appointment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == "staff" || auth()->user()->role == "patient" ) {
            return $next($request);
        }
            abort(403, 'Unauthorized action.');

    }
}
