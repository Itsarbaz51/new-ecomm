<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->utype === 'Admin') {
                return $next($request);
            } else {
                Session::flush();
                return redirect()->route('login')->with('error', 'You are not authorized to access this page');
            }
        } else {
            return redirect()->route('home.index'); // 👈 Yahi hona chahiye
        }
        
    }
}
