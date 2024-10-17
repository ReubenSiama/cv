<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\VisitorCountMiddleware;
use App\Livewire\Calculation;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->middleware(VisitorCountMiddleware::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact', 'storeContact')->name('contact.store');
        Route::get('/portfolios', 'portfolios')->name('portfolios');
        Route::get('/portfolios/{portfolio}', 'view')->name('portfolios.view');
        Route::get('/experiences', 'experiences')->name('experiences');
    });

Route::get('/calculate', Calculation::class)->name('calculate');
