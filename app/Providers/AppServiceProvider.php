<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\ServiceProvider;


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
        //$value="Student Register";

        //View::share('title', 'Student Admin');
        view()->share('title', 'Student Admin');
    }
}
