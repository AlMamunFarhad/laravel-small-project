<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\Password;
// use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password;
//use Illuminate\Contracts\Auth\PasswordBroker;
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


        Password::defaults(function() {
            $theRules = Password::min(3)->mixedCase()->symbols()->numbers();
            return $this->app->isProduction() ? $theRules->uncompromised() : $theRules;
        });

        Paginator::useBootstrapFive();
    }
}
