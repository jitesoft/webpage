<?php

Route::get('/', App\Http\Controllers\Web\IndexController::class . "@getPage");
Route::get('/page/{page?}', App\Http\Controllers\Web\IndexController::class . "@getPage");
