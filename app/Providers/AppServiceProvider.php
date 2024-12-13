<?php

namespace App\Providers;

use App\Services\PaymentService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Forms\InputField;
use App\View\Components\Forms\RadioField;
use App\View\Components\Forms\CheckboxField;
use App\View\Components\Forms\TextareaField;
use App\View\Components\Forms\SelectField;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind PaymentService into the service container
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('forms.input-field', InputField::class);
        Blade::component('forms.radio-field', RadioField::class);
        Blade::component('forms.checkbox-field', CheckboxField::class);
        Blade::component('forms.textarea-field', TextareaField::class);
        Blade::component('forms.select-field', SelectField::class);
    }
}
