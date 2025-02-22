<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

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
        //
        view()->composer('*', function ($view) {
            $user = Auth::guard('user')->user();

            $name = $user ? $user->first_name . ' ' . $user->last_name : null;

             $view->with(compact('name'));
        });
    }
}
