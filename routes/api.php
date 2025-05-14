<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function() {
    Route::get('by-id/{user}', [UserController::class, 'findById']);
    Route::post('register', [UserController::class, 'register']);
});
