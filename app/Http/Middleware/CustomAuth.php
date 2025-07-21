<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated via session
        if (!session()->has('username')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        return $next($request);
    }
}