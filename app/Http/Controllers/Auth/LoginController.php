<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        // Rate limiting - max 5 attempts per minute
        $throttleKey = Str::transliterate(Str::lower($request->input('username')).'|'.$request->ip());
        
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            throw ValidationException::withMessages([
                'username' => "Too many login attempts. Please try again in {$seconds} seconds.",
            ]);
        }
        
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = \App\Models\User::where('username', $request->username)->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            RateLimiter::hit($throttleKey, 60);
            
            throw ValidationException::withMessages([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }

        // Check if user is active
        if ($user->status !== 'active') {
            RateLimiter::hit($throttleKey, 60);
            
            throw ValidationException::withMessages([
                'username' => 'Your account has been deactivated.',
            ]);
        }

        // Clear rate limiter on successful login
        RateLimiter::clear($throttleKey);
        
        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        // Redirect based on role
        if ($user->isAdmin()) {
            return redirect()->intended('/admin/dashboard');
        }

        if ($user->isTechnician()) {
            return redirect()->intended('/app/dashboard');
        }

        return redirect()->intended('/');
    }
}
