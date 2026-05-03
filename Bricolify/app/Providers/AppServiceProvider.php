<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
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
        Gate::define('is-admin', function (User $user) {
            return $user->isAdmin();
        });


        Gate::define('is-worker', function (User $user) {
            return $user->isWorker();
        });


        Gate::define('is-client', function (User $user) {
            return $user->isClient();
        });
    }
}
