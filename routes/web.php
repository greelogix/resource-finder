<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout.master');
});
Route::get('/link', function () {
    Artisan::call('storage:link');
    return true;
});

Route::resource('projects', ProjectController::class);
