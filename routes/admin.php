<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\AuthenticationMiddleware;
use Illuminate\Routing\Router;

Route::get('/', AdminController::class . "@getIndex");

Route::group(['alias' => 'providers'], function(Router $router) {
    $router->get('/google', AuthController::class . "@getGoogleAuthRedirection");
    $router->get('/google/callback', AuthController::class . "@getHandleGoogleProviderCallback");

    $router->get('/jb-hub', AuthController::class . "@getJbHubAuthRedirection");
    $router->get('/jb-hub/callback', AuthController::class . "@getHandleJbHubProviderCallback");
});

Route::group([
    'alias' => 'restricted',
    'middleware' => AuthenticationMiddleware::class
], function(Router $router) {
    $router->get('/dashboard', AdminController::class . "@getDashboard");
});
