<?php
use Illuminate\Routing\Router;

Route::get('/', \App\Http\Controllers\Admin\AdminController::class . "@getIndex");

Route::group(['alias' => 'google'], function(Router $router) {

    $router->get('/google', App\Http\Controllers\Admin\AuthController::class . "@getGoogleAuthRedirection");
    $router->get('/google/callback', App\Http\Controllers\Admin\AuthController::class . "@getHandleGoogleProviderCallback");

});


Route::group([
    'alias' => 'restricted',
    'middleware' => App\Http\Middleware\AuthenticationMiddleware::class
    ],
    function(Router $router) {
        $router->get('/dashboard', App\Http\Controllers\Admin\AdminController::class . "@getDashboard");
    }
);
