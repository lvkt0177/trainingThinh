<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        view()->composer('*', function ($view) {
            $user = Auth::guard('user')->user();
            
            $name = $user? $user->name : "User";
            $id_user = $user? $user->id : null;

            $view->with(compact('name','id_user'));
        });
    }
}
