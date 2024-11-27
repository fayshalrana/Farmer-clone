<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Http;

Route::get('/', [UiController::class, 'homeController'])->name('home');

Route::group(['prefix' => 'ui'], function () {
    
    Route::get('/about', [UiController::class, 'aboutController'])->name('about');
});