<?php

use App\Http\Controllers\Admin\Auth\AuthenticateController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Order\IndexController as IndexOrdersController;
use App\Http\Controllers\Admin\Order\SendInvoiceController;
use App\Http\Controllers\Admin\Order\SendInvoiceOrdersController;
use App\Http\Controllers\Admin\Ticket\CreateController as CreateTicketsController;
use App\Http\Controllers\Admin\Ticket\DestroyController as DestroyTicketsController;
use App\Http\Controllers\Admin\Ticket\EditController as EditTicketsController;
use App\Http\Controllers\Admin\Ticket\IndexController as IndexTicketsController;
use App\Http\Controllers\Admin\Ticket\StoreController as StoreTicketsController;
use App\Http\Controllers\Admin\Ticket\UpdateController as UpdateTicketsController;
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
        Route::put('{id}', UpdateTicketsController::class)->name('update');
        Route::delete('{id}', DestroyTicketsController::class)->name('destroy');
    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', IndexOrdersController::class)
             ->name('index');
        Route::get('{id}/send-invoice', SendInvoiceOrdersController::class)
             ->name('send-invoice');
        Route::post('{id}/send-invoice', SendInvoiceController::class)
             ->name('send');
    });
});
