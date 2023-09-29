<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Fortify;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for("login", function () {
            Limit::perMinute(5);
        });
    }
}
