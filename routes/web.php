<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Ticket\ShowTicketController;
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

Route::get('/', HomeController::class);

Route::prefix('tickets')->name('tickets.')->group(function () {
    Route::get('{id}', ShowTicketController::class)
         ->name('show');
});