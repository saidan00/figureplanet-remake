<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->status) {
            Auth::logout();

            return redirect()->route('login')->with(['flash' => 'Your account has been suspended. Please contact administrator.']);
        }

        return $next($request);
    }
}
