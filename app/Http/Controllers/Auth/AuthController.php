<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return view('auth.signin', ['title' => 'Sign In']);
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Check if user is active
            if (!$user->isActive()) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'username' => 'Your account has been deactivated.',
                ]);
            }

            return $this->redirectBasedOnRole($user);
        }

        throw ValidationException::withMessages([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin');
    }

    /**
     * Redirect user based on their role.
     */
    protected function redirectBasedOnRole($user)
    {
        if ($user->isAdmin()) {
            return redirect()->intended('/admin/dashboard');
        }

        if ($user->isTechnician()) {
            return redirect()->intended('/app/dashboard');
        }

        return redirect('/');
    }
}
