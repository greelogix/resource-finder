<?php

use App\Http\Controllers\Api\ListingController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('store')->group(function () {
    Route::post('email', [UserController::class, 'storeEmail']);
    Route::post('phone', [UserController::class, 'storePhone']);
});

Route::prefix('project')->group(function () {
    Route::get('types', [ListingController::class, 'projectTypes']);
    Route::get('experience', [ListingController::class, 'experience']);
    Route::post('store', [ProjectController::class, 'store']);
    // Route::post('phone', [UserController::class, 'storePhone']);
});
