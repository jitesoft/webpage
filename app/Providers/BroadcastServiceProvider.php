<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        /** @noinspection PhpUndefinedMethodInspection */
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        /** @noinspection PhpUndefinedMethodInspection */
        Broadcast::channel('App.User.*', function ($user, $userId) {
            return (int)$user->id === (int)$userId;
        });
    }
}
