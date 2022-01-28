<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    // Auth
    Route::post('/login', 'AuthController@login');

    Route::middleware('auth:api')->group(function(){
        Route::apiResources([
            'users' => 'UserController',
            'gifts' => 'GiftController'
        ]);
    });
});


