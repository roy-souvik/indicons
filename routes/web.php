<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkshopController;
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

Route::get('/registration', [RegistrationController::class, 'show'])->name('conference-register.show');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacypolicy');

Route::get('/terms-conditions', function () {
    return view('tnd');
})->name('tnd');

Route::get('/refund', function () {
    return view('refund');
})->name('refund');

Route::get('/about', function () {
    return view('about');
})->name('about');

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

Route::get('/contact-us', function () {
    return view('contact');
})->name('contactus.show');

Route::post('/contact-us', [RegistrationController::class, 'contactUsEmail'])->name('contactus.send');

Route::get('/sponsorships', [SponsorshipController::class, 'sponsorshipShow'])->name('sponsorship.show');

Route::post('/registration', [RegistrationController::class, 'register']);

Route::get('/workshop-register', [RegistrationController::class, 'workshopRegisterShow'])
    ->name('workshop.register.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfilePage'])
        ->name('profile.show');

    Route::post('/create-orders', [PaymentController::class, 'createOrder'])
        ->name('payment.orders.create');

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

    Route::get('/sponsorships-buy', [SponsorshipController::class, 'sponsorshipBuyPage'])
        ->name('sponsorship.buy');

    Route::get('/sponsorships-cart', [SponsorshipController::class, 'getSponsorshipCart'])
        ->name('sponsorship.cart');

    Route::post('/sponsorship-payments', [SponsorshipController::class, 'createSponsorshipPayment'])
        ->name('sponsorship.payment');

    Route::post('/user-sponsorships/{sponsorship}', [SponsorshipController::class, 'saveUserSponsorship'])
        ->name('user.sponsorships.save');

    Route::post('/sponsorships-delete/{sponsorship}', [SponsorshipController::class, 'removeUserSponsorship'])
        ->name('sponsorships.delete');

    Route::post('/workshop-payments', [WorkshopController::class, 'saveWorkshopPayment'])
        ->name('workshop.payment.save');

    Route::post('/apply-coupon', [CouponsController::class, 'apply'])->name('coupons.apply');
    Route::post('/unapply-coupon', [CouponsController::class, 'unapply'])->name('coupons.unapply');

    // Admin routes
    Route::middleware(['auth.super_admin'])->prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.home');
        })->name('admin');

        Route::get('/coupons', [CouponsController::class, 'index'])->name('admin.coupons.index');
        Route::post('/coupons', [CouponsController::class, 'create'])->name('admin.coupons.create');
        Route::delete('/coupons/{coupon}', [CouponsController::class, 'destroy'])->name('admin.coupons.destroy');

        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

        Route::get('/fees-structure', [AdminController::class, 'manageFeesStructure'])
            ->name('admin.manage.fees');

        Route::post('/fees-structure', [AdminController::class, 'updateFeesStructure'])
            ->name('admin.fees.update');

        Route::get('/conference-payments', [AdminController::class, 'conferencePayments'])
            ->name('admin.conference.payments');

        Route::get('/workshop-payments', [AdminController::class, 'workshopPayments'])
            ->name('admin.workshop.payments');

        Route::get('/conference-registrations', [AdminController::class, 'conferenceRegistrations'])
            ->name('admin.conference-registrations');

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

        Route::get('/workshop-payments', [AdminController::class, 'workshopPaymentsShow'])
            ->name('admin.workshop.payments.show');

        Route::delete('/sponsorship-features/{feature}', [AdminController::class, 'sponsorshipFeaturesDelete'])
            ->name('admin.sponsorship.features.delete');

        Route::get('/members', [AdminController::class, 'vaiMembersShow'])
            ->name('admin.members.show');

        Route::get('/configurations', [AdminController::class, 'configShow'])
            ->name('admin.config.show');

        Route::put('/configurations/{config}', [AdminController::class, 'configUpdate'])
            ->name('admin.config.update');

        Route::post('/resend-confirmation', [AdminController::class, 'resendConferenceEmail'])->name('admin.resend.paymentConfirmation');

        Route::get('/payment-pdf', [AdminController::class, 'paymentPdf'])->name('admin.payment.pdf');
    });
});

require __DIR__ . '/auth.php';
