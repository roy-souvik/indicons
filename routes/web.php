<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Models\Role;
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
    $roles = Role::active()->get();

    return view('conference-register', compact('roles'));
})->name('conference-register.show');

Route::post('/registration', function () {
    return view('conference-register');
})->name('conference-register.save');

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

    Route::get('/abstract', function () {
        return view('abstract');
    })->name('abstract.show');

    Route::post('/abstract', [RegistrationController::class, 'saveAbstract'])
        ->name('abstract.save');

    Route::post('/accompanying-persons', [RegistrationController::class, 'createAccompanyingPerson'])
        ->name('accompanyingPersons.save');

    Route::delete('/accompanying-persons/{id}', [RegistrationController::class, 'deleteAccompanyingPerson'])
        ->name('accompanyingPersons.delete');
    // Admin routes
    Route::middleware(['auth.super_admin'])->prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.home');
        })->name('admin');

        Route::get('/home', function () {
            return view('admin.home');
        })->name('admin.home');

        Route::get('/fees-structure', [AdminController::class, 'manageFeesStructure'])
            ->name('admin.manage.fees');

        Route::post('/fees-structure', [AdminController::class, 'updateFeesStructure'])
            ->name('admin.fees.update');

        Route::get('/conference-payments', [AdminController::class, 'conferencePayments'])
            ->name('admin.conference.payments');

        Route::get('/abstracts', [AdminController::class, 'abstractList'])
            ->name('admin.abstracts.show');

        Route::post('/abstracts', [AdminController::class, 'abstractUpdate'])
            ->name('admin.abstracts.update');
    });
});

require __DIR__ . '/auth.php';
