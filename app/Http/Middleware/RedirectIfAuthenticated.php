<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "caretaker" && Auth::guard($guard)->check()) {
            return redirect()->route("caretaker.home", ['url' => 'caretaker']);
        }

        if ($guard == "practitioner" && Auth::guard($guard)->check()) {
            return redirect()->route("practitioner.home", ['url' => 'practitioner']);
        }

        if ($guard == "sponsor" && Auth::guard($guard)->check()){
            return redirect()->route("sponsor.home", ['url' => 'sponsor']);
        }

        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
