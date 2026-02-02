<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Guest Routes - Authentication
Route::middleware('guest')->group(function () {
    Route::get('/signin', function () {
        return view('auth.signin', ['title' => 'Sign In']);
    })->name('signin');
    
    Route::post('/signin', [LoginController::class, 'store'])
        ->middleware('throttle:10,1') // Max 10 requests per minute
        ->name('signin.post');
});

// Logout Route (Authenticated)
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('signin');
})->middleware('auth')->name('logout');

// Root redirect
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->isAdmin()) {
            return redirect('/admin/dashboard');
        }
        if ($user->isTechnician()) {
            return redirect('/app/dashboard');
        }
    }
    return redirect()->route('signin');
});

require __DIR__.'/admin.php';
require __DIR__.'/app.php';

// Error Pages (accessible without auth)
Route::get('/error-404', function () {
    return view('errors.error-404', ['title' => 'Error 404']);
})->name('error-404');






















