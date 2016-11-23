<?php

namespace App\Providers;

use AssetHandler;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {



        // Development packages:
        if($this->app->environment() !== "production") {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
