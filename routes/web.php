<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact', 'storeContact')->name('contact.store');
        Route::get('/portfolios', 'portfolios')->name('portfolios');
        Route::get('/portfolios/{portfolio}', 'view')->name('portfolios.view');
        Route::get('/experiences', 'experiences')->name('experiences');
    });
