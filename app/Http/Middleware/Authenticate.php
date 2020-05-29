<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ( $request->is('caretaker') ) {
                return route('login.caretaker.show', ['url' => 'caretaker']);
            }

            if( $request->is('practitioner') ) {
                return route('login.practitioner.show', ['url' => 'practitioner']);
            }

            if( $request->is('sponsor') ) {
                return route('login.sponsor.show', ['url' => 'sponsor']);
            }

            if( $request->is('admin') ) {
                return route('login', ['url' => 'admin']);
            }

            return route('login');

        }
    }
}
