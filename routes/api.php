<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::resource('users', 'UserController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
