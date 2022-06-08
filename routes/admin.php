<?php

use App\Http\Controllers\Admin\Auth\AuthenticateController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Ticket\CreateController as CreateTicketsController;
use App\Http\Controllers\Admin\Ticket\EditController as EditTicketsController;
use App\Http\Controllers\Admin\Ticket\IndexController as IndexTicketsController;
use App\Http\Controllers\Admin\Ticket\StoreController as StoreTicketsController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('login', LoginController::class)
     ->name('login');

Route::post('login', AuthenticateController::class)
     ->name('authenticate');

Route::middleware(IsAdminMiddleware::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', IndexTicketsController::class)->name('index');
        Route::get('create', CreateTicketsController::class)->name('create');
        Route::post('/', StoreTicketsController::class)->name('store');
        Route::get('{id}/edit', EditTicketsController::class)->name('edit');
    });
});
