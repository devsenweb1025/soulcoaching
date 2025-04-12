<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalWebhookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
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

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {

        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!(Str::contains($val['path'], 'documentation') || Str::contains($val['path'], 'landing'))) {
            $route->middleware('auth');
            $route->middleware('admin');
        }

        // Custom page demo for 500 server error
        if (Str::contains($val['path'], 'error-500')) {
            Route::get($val['path'], function () {
                abort(500, 'Something went wrong! Please try again later.');
            });
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
    Route::resource('layout-builder', LayoutBuilderController::class)->only(['store']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/store-shipping-info', [CartController::class, 'storeShippingInfo'])->name('cart.store-shipping-info');

    // Checkout routes
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/checkout/process', [CartController::class, 'processCheckout'])->name('cart.checkout.process');
    Route::get('/cart/checkout/success', [CartController::class, 'checkoutSuccess'])->name('cart.checkout.success');

    // Payment routes
    Route::prefix('payment')->group(function () {
        // PayPal routes
        Route::post('/paypal/create', [PaymentController::class, 'createPayPalPayment'])->name('payment.paypal.create');
        Route::get('/paypal/success', [PaymentController::class, 'handlePayPalSuccess'])->name('payment.paypal.success');
        Route::get('/paypal/cancel', [PaymentController::class, 'handlePayPalCancel'])->name('payment.paypal.cancel');

        // Stripe routes
        Route::post('/stripe/create-payment-intent', [StripeController::class, 'createPaymentIntent'])->name('stripe.create-payment-intent');
        Route::get('/stripe/success', [StripeController::class, 'handleSuccess'])->name('stripe.success');
        Route::get('/stripe/cancel', [StripeController::class, 'handleCancel'])->name('stripe.cancel');
    });

    // Order Routes
    Route::get('/account/orders', [OrderController::class, 'index'])->name('account.orders');
    Route::get('/account/orders/{order}', [OrderController::class, 'show'])->name('account.orders.show');
    Route::post('/account/orders/track', [OrderController::class, 'track'])->name('account.orders.track');
});

Route::resource('users', UsersController::class);


// Booking
Route::get('booking', [LandingController::class, 'booking'])->name('booking');
Route::get('payment', [LandingController::class, 'payment'])->name('payment');

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

Route::get('', [LandingController::class, 'index'])->name('home');
Route::get('about', [LandingController::class, 'about'])->name('about');
Route::get('services', [LandingController::class, 'services'])->name('services');
Route::get('prices', [LandingController::class, 'prices'])->name('prices');
Route::get('online-course', [LandingController::class, 'course'])->name('course');
Route::get('online-shop', [LandingController::class, 'shop'])->name('shop');
Route::get('contact', [LandingController::class, 'contact'])->name('contact');
Route::get('medien', [LandingController::class, 'medien'])->name('medien');
Route::get('impressum', [LandingController::class, 'impressum'])->name('impressum');
Route::get('datenschutz', [LandingController::class, 'datenschutz'])->name('datenschutz');
Route::get('agb', [LandingController::class, 'agb'])->name('agb');

// Payment Routes

// Admin Product Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});

require __DIR__ . '/auth.php';
