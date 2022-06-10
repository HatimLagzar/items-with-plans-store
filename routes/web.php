<?php

use App\Http\Controllers\Client\Contact\ContactUsController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Login\LoginController;
use App\Http\Controllers\Client\Login\LogoutController;
use App\Http\Controllers\Client\Login\ShowLoginPageController;
use App\Http\Controllers\Client\Order\OrderController;
use App\Http\Controllers\Client\Order\ShowOrderSuccessController;
use App\Http\Controllers\Client\Register\RegisterController;
use App\Http\Controllers\Client\Register\ShowRegisterPageController;
use App\Http\Controllers\Client\Ticket\ShowTicketController;
use App\Http\Controllers\Client\Ticket\ShowUserTicketsController;
use App\Http\Controllers\Client\TicketPlan\ShowController as AskForPaymentMethodPlanController;
use App\Http\Controllers\Client\Verification\AskForVerificationController;
use App\Http\Controllers\Client\Verification\ResendVerificationController;
use App\Http\Controllers\Client\Verification\VerifyController;
use App\Http\Controllers\ResetPassword\EmailResetPasswordController;
use App\Http\Controllers\ResetPassword\SetNewPasswordController;
use App\Http\Controllers\ResetPassword\ShowResetPasswordController;
use App\Http\Controllers\ResetPassword\ShowResetPasswordFormController;
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

Route::post('contact', ContactUsController::class)->name('contact');

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

Route::get('login', ShowLoginPageController::class)->name('login-page');
Route::post('login', LoginController::class)->name('login');

Route::post('logout', LogoutController::class)->name('logout')->middleware('auth');

Route::get('register', ShowRegisterPageController::class)->name('register-page');
Route::post('register', RegisterController::class)->name('register');

Route::prefix('forgot-password')->name('password.')->group(function () {
    Route::get('/', ShowResetPasswordController::class)
         ->middleware('guest')
         ->name('request');

    Route::post('/', EmailResetPasswordController::class)
         ->middleware('guest')
         ->name('email');

    Route::get('{token}', ShowResetPasswordFormController::class)
         ->name('reset');

    Route::post('update', SetNewPasswordController::class)
         ->name('update');
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

    Route::get('/', ShowUserTicketsController::class)
         ->name('index')
         ->middleware('auth:web');

    Route::prefix('plans')->name('plans.')->group(function () {
        Route::get('{id}', AskForPaymentMethodPlanController::class)
             ->name('order');

        Route::post('{id}', OrderController::class)
             ->name('store');
    });
});