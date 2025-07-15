<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS when using ngrok
        if (request()->header('x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }

        // Also force HTTPS for ngrok domains
        if (str_contains(request()->getHost(), 'ngrok') || str_contains(request()->getHost(), 'ngrok.io')) {
            URL::forceScheme('https');
            URL::forceRootUrl('https://' . request()->getHost());
        }
    }
}
