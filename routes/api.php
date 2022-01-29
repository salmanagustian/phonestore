<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    // Auth
    Route::post('/login', 'AuthController@login');

    // Redeem Gift.
    Route::post('/gifts/{gift}/redeem', 'GiftController@redeem');
    Route::post('/gifts/{gift}/rating', 'GiftController@rating');

    // Route::middleware('auth:sanctum')->group(function(){
        Route::apiResources([
            'users' => 'UserController',
            'gifts' => 'GiftController'
        ]);
    // });

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});


