<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Http;

Route::get('/', [UiController::class, 'welcomePage'])->name('welcome-page');

Route::group(['prefix' => 'ui'], function () {
    // 
    Route::get('/home', [UiController::class, 'homeController'])->name('home');
    Route::get('/about', [UiController::class, 'aboutController'])->name('about');
});
