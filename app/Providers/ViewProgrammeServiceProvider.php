<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewProgrammeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Bind data to a specific view or group of views
        View::composer('partials.programs-menu', function ($view) {
            $data = \App\Models\Program::get();
            $view->with('data', $data);
        });
    }
}
