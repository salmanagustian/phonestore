<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    // Auth
    Route::post('/login', 'AuthController@login');

    // Users
    // Route::middleware('auth:api')->group(function() {
        Route::resource('users', 'UserController');
    // });

    // Gifts
    Route::resource('gifts', 'GiftController');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
