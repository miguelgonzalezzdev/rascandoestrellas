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
        if($this->app->environment('production')){
            file_put_contents(base_path('Procfile'), "web: vendor/bin/heroku-php-apache2 public/\n", FILE_APPEND);
            URL::forceScheme('https');
        }
    }
}
