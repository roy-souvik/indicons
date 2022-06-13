<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/registration', function () {
    return view('conference-register');
});

Route::post('/registration', function () {
    return view('conference-register');
});

Route::post('/registration', [RegistrationController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::get('/conference-payment', [PaymentController::class, 'showConferencePaymentPage'])
        ->name('payment.show');

    Route::post('/save-payment', [PaymentController::class, 'saveConferencePayment'])
        ->name('payment.save');

    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])
        ->name('payment.success');

    // Route::get('handle-payment', 'PaymentController@handlePayment')->name('payment.handler');
    Route::get('cancel-payment', 'PaymentController@paymentCancel')->name('payment.cancel');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['auth.super_admin'])->prefix('admin')->group(function () {
        Route::get('/conference-payments', [AdminController::class, 'conferencePayments'])
            ->name('admin.conference.payments');

        Route::get('/home', function () {
            return view('admin.home');
        })->name('admin.home');
    });
});

require __DIR__ . '/auth.php';
