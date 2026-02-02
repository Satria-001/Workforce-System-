<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Disable default Fortify login view - we use custom signin route
        Fortify::loginView(function () {
            return redirect()->route('signin');
        });
        
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        // Custom authentication logic
        Fortify::authenticateUsing(function (Request $request) {
            $user = \App\Models\User::where('username', $request->username)->first();

            if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
                // Check if user is active
                if (!$user->status || $user->status !== 'active') {
                    return null;
                }
                return $user;
            }

            return null;
        });

        // Custom redirect logic after login
        Fortify::authenticated(function ($request, $user) {
            return redirect()
                ->intended(
                    $user->isAdmin() ? '/admin/dashboard' : 
                    ($user->isTechnician() ? '/app/dashboard' : '/')
                );
        });

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
