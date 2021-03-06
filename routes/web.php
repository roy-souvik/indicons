<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SponsorshipController;
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
})->name('home');

Route::get('/registration', function () {
    $roles = Role::active()->get();

    return view('conference-register', compact('roles'));
})->name('conference-register.show');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacypolicy');

Route::get('/tnd', function () {
    return view('tnd');
})->name('tnd');

Route::get('/refund', function () {
    return view('refund');
})->name('refund');

Route::get('/abstracts-importnant-dates', function () {
    return view('abstract-dates');
})->name('abstract.dates');

Route::get('/abstracts-guidelines', function () {
    return view('abstract-guidelines');
})->name('abstract.guidelines');

Route::get('/abstracts-poster-guidelines', function () {
    return view('abstract-poster-guidelines');
})->name('abstract.posterguidelines');

Route::get('/abstracts-e-poster-guidelines', function () {
    return view('abstract-eposter-guidelines');
})->name('abstract.eposterguidelines');

Route::get('/abstracts-submit', function () {
    return view('abstract-submitpage');
})->name('abstract.submitpage');

Route::post('/registration', function () {
    return view('conference-register');
})->name('conference-register.save');

Route::get('/conference', function () {
    return view('conference');
})->name('conference.home');

Route::get('/information', function () {
    return view('information');
})->name('information.home');

Route::get('/scientific', function () {
    return view('scientific');
})->name('scientific.home');

Route::get('/accommodation', function () {
    return view('accommodation');
})->name('accommodation.home');

Route::get('/abstract', function () {
    return view('abstract');
})->name('abstract.show');

Route::get('/nurses', function () {
    return view('nurses');
})->name('nurses.home');

Route::get('/sponsorships', [SponsorshipController::class, 'sponsorshipShow'])->name('sponsorship.show');

Route::get('/sponsorships/{sponsorship}', [SponsorshipController::class, 'sponsorshipBuyPage'])->name('sponsorship.buy');

Route::post('/registration', [RegistrationController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/conference-payment', [PaymentController::class, 'showConferencePaymentPage'])
        ->name('payment.show');

    Route::post('/save-payment', [PaymentController::class, 'saveConferencePayment'])
        ->name('payment.save');

    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])
        ->name('payment.success');

    Route::get('cancel-payment', 'PaymentController@paymentCancel')->name('payment.cancel');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/abstract', [RegistrationController::class, 'saveAbstract'])
        ->name('abstract.save');

    Route::post('/accompanying-persons', [RegistrationController::class, 'createAccompanyingPerson'])
        ->name('accompanyingPersons.save');

    Route::delete('/accompanying-persons/{id}', [RegistrationController::class, 'deleteAccompanyingPerson'])
        ->name('accompanyingPersons.delete');

    Route::post('/sponsorship-payments', [SponsorshipController::class, 'createSponsorshipPayment'])
        ->name('sponsorship.payment');

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

        Route::get('/sponsorships', [AdminController::class, 'sponsorshipShow'])
            ->name('admin.sponsorship.show');

        Route::get('/sponsorships/{sponsorship}', [AdminController::class, 'sponsorshipEdit'])
            ->name('admin.sponsorship.edit');

        Route::post('/sponsorships/{sponsorship}', [AdminController::class, 'sponsorshipUpdate'])
            ->name('admin.sponsorship.update');

        Route::delete('/sponsorships/{sponsorship}', [AdminController::class, 'sponsorshipDelete'])
            ->name('admin.sponsorship.delete');

        Route::post('/sponsorships/{sponsorship}/features', [AdminController::class, 'sponsorshipFeaturesCreate'])
            ->name('admin.sponsorship.features.create');

        Route::get('/sponsorships/{sponsorship}/features', [AdminController::class, 'sponsorshipFeaturesShow'])
            ->name('admin.sponsorship.features.show');

        Route::get('/sponsorship-payments', [AdminController::class, 'sponsorshipPaymentsShow'])
            ->name('admin.sponsorship.payments.show');

        Route::delete('/sponsorship-features/{feature}', [AdminController::class, 'sponsorshipFeaturesDelete'])
            ->name('admin.sponsorship.features.delete');

        Route::get('/configurations', [AdminController::class, 'configShow'])
            ->name('admin.config.show');

        Route::put('/configurations/{config}', [AdminController::class, 'configUpdate'])
            ->name('admin.config.update');
    });
});

require __DIR__ . '/auth.php';
