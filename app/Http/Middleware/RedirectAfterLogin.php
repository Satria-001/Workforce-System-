<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAfterLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // If user just logged in, redirect based on role
        if (Auth::check() && $request->getRequestUri() === '/login' && $request->isMethod('post')) {
            $user = Auth::user();
            
            if ($user->isAdmin()) {
                return redirect('/admin/dashboard');
            }

            if ($user->isTechnician()) {
                return redirect('/app/dashboard');
            }
        }

        return $response;
    }
}
