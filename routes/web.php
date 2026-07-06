<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CvController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cv')->group(function(){
    Route::controller(CvController::class)->group(function(){
        Route::get('/', 'index');
        Route::get('/download', 'download');
    });
});
