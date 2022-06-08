<?php

use App\Http\Controllers\Admin\Auth\AuthenticateController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Ticket\IndexController as IndexTicketsController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', LoginController::class)
     ->name('login');

Route::post('login', AuthenticateController::class)
     ->name('authenticate');

Route::middleware(IsAdminMiddleware::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', IndexTicketsController::class)->name('index');
    });
});
