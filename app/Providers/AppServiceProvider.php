<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (App::environment(['staging', 'production'])) {
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
        // Paginator::useBootstrapFive();
    }
}
