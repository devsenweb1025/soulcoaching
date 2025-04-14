<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as OrderManagementController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\BookingController;
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



// Landing
Route::get('', [LandingController::class, 'index'])->name('home');
Route::get('about', [LandingController::class, 'about'])->name('about');
Route::get('services', [LandingController::class, 'services'])->name('services');
Route::get('prices', [LandingController::class, 'prices'])->name('prices');
Route::get('online-course', [LandingController::class, 'course'])->name('course');
Route::get('contact', [LandingController::class, 'contact'])->name('contact');
Route::get('medien', [LandingController::class, 'medien'])->name('medien');
Route::get('impressum', [LandingController::class, 'impressum'])->name('impressum');
Route::get('datenschutz', [LandingController::class, 'datenschutz'])->name('datenschutz');
Route::get('agb', [LandingController::class, 'agb'])->name('agb');

// Booking
Route::get('booking', [LandingController::class, 'booking'])->name('booking');
Route::get('payment', [LandingController::class, 'payment'])->name('payment');

// ------------------------ Online Shop Start------------------------
// Shop routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/search', [App\Http\Controllers\ShopController::class, 'search'])->name('shop.search');
Route::get('/shop/category/{category}', [App\Http\Controllers\ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');

// require auth
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/store-shipping-info', [CartController::class, 'storeShippingInfo'])->name('cart.store-shipping-info');
    Route::post('/cart/update-shipping', [CartController::class, 'updateShipping'])->name('cart.update-shipping');

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

// --------------------------------------------- Online Shop End---------------------------------------------

Route::resource('users', UsersController::class);

// Admin Product Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class)->names('products');
    // ... existing code ...
    // Order Management Routes
    Route::get('/orders', [OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderManagementController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [OrderManagementController::class, 'updateStatus'])->name('orders.status');
    Route::post('/orders/{order}/payment-status', [OrderManagementController::class, 'updatePaymentStatus'])->name('orders.payment-status');
    Route::post('/orders/{order}/tracking', [OrderManagementController::class, 'updateTracking'])->name('orders.tracking');
    Route::delete('/orders/{order}', [OrderManagementController::class, 'destroy'])->name('orders.destroy');

    // Chat Routes
    Route::prefix('chat')->name('chat.')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::get('/conversations', [ChatController::class, 'conversations'])->name('conversations');
        Route::get('/settings', [ChatController::class, 'settings'])->name('settings');
        Route::post('/settings/update', [ChatController::class, 'updateSettings'])->name('settings.update');
    });

    // Booking Management Routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/events', [BookingController::class, 'getEvents'])->name('bookings.events');
    Route::get('/bookings/invitees', [BookingController::class, 'getInvitees'])->name('bookings.invitees');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

Route::resource('settings', SettingsController::class)->names('settings');

require __DIR__ . '/auth.php';
