<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Order\OrderController;
use App\Http\Controllers\Client\Order\ShowOrderSuccessController;
use App\Http\Controllers\Client\Ticket\ShowTicketController;
use App\Http\Controllers\Client\TicketPlan\ShowController as AskForPaymentMethodPlanController;
use App\Http\Controllers\Client\Verification\AskForVerificationController;
use App\Http\Controllers\Client\Verification\ResendVerificationController;
use App\Http\Controllers\Client\Verification\VerifyController;
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

Route::name('verification.')->group(function () {
    Route::get('email/verify/{id}/{hash}', VerifyController::class)
         ->name('verify');

    Route::prefix('verification')->middleware('auth')->group(function () {
        Route::get('/', AskForVerificationController::class)
             ->name('ask');
        Route::post('resend', ResendVerificationController::class)
             ->name('resend');
    });
});


Route::get('/', HomeController::class)->name('home');
Route::get('terms', function () {
    return 'hi';
})->name('terms');

Route::prefix('tickets')->name('tickets.')->group(function () {
    Route::get('success', ShowOrderSuccessController::class)
         ->name('success');

    Route::get('{id}', ShowTicketController::class)
         ->name('show');

    Route::prefix('plans')->name('plans.')->group(function () {
        Route::get('{id}', AskForPaymentMethodPlanController::class)
             ->name('order');

        Route::post('{id}', OrderController::class)
             ->name('store');
    });
});