<?php

namespace App\Providers;

use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {


        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);



        // Development packages:
        if ($this->app->environment() !== "production") {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
