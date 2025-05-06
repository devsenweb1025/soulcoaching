<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\OrderController as OrderManagementController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\CoursePaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\ServiceController as ServiceManagementController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\CartPaymentController;
use App\Http\Controllers\Admin\PageContentController;
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
Route::get('ueber-mich', [LandingController::class, 'about'])->name('about');
Route::get('kontakt', [LandingController::class, 'contact'])->name('contact');
Route::post('kontakt', [LandingController::class, 'contactSubmit'])->name('contact.submit');
Route::get('medien', [LandingController::class, 'medien'])->name('medien');
Route::get('impressum', [LandingController::class, 'impressum'])->name('impressum');
Route::get('datenschutz', [LandingController::class, 'datenschutz'])->name('datenschutz');
Route::get('agb', [LandingController::class, 'agb'])->name('agb');

// Booking
Route::get('buchung', [LandingController::class, 'booking'])->name('booking');
Route::get('zahlung', [LandingController::class, 'payment'])->name('payment');

// ------------------------ Online Shop Start------------------------
// Shop routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/suchen', [App\Http\Controllers\ShopController::class, 'search'])->name('shop.search');
Route::get('/shop/kategorie/{category}', [App\Http\Controllers\ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');

Route::get('/kurs', [CoursePaymentController::class, 'index'])->name('course');

// Cart routes
Route::get('/warenkorb', [CartController::class, 'index'])->name('cart.index');
Route::post('/warenkorb/hinzufügen/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::post('/warenkorb/aktualisieren/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/warenkorb/entfernen/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/warenkorb/leeren', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/warenkorb/versandinformationen-speichern', [CartController::class, 'storeShippingInfo'])->name('cart.store-shipping-info');
Route::post('/warenkorb/versandinformationen-aktualisieren', [CartController::class, 'updateShipping'])->name('cart.update-shipping');

// Checkout routes
Route::get('/warenkorb/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/warenkorb/checkout/verarbeiten', [CartController::class, 'processCheckout'])->name('cart.checkout.process');
Route::get('/warenkorb/checkout/erfolg', [CartController::class, 'checkoutSuccess'])->name('cart.checkout.success');

// Payment routes
Route::prefix('zahlung')->group(function () {
    // PayPal routes
    Route::post('/paypal/erstellen', [PaymentController::class, 'createPayPalPayment'])->name('payment.paypal.create');
    Route::get('/paypal/erfolg', [PaymentController::class, 'handlePayPalSuccess'])->name('payment.paypal.success');
    Route::get('/paypal/stornieren', [PaymentController::class, 'handlePayPalCancel'])->name('payment.paypal.cancel');

    // Stripe routes
    Route::post('/stripe/erstellen', [StripeController::class, 'createPaymentIntent'])->name('stripe.create-payment-intent');
    Route::get('/stripe/erfolg', [StripeController::class, 'handleSuccess'])->name('stripe.success');
    Route::get('/stripe/stornieren', [StripeController::class, 'handleCancel'])->name('stripe.cancel');
});

// require auth
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('profil', [ProfileController::class, 'index'])->name('profile');
    Route::get('profil/bearbeiten', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profil/aktualisieren', [ProfileController::class, 'update'])->name('profile.update');


    // Order Routes
    Route::get('/konto/bestellungen', [OrderController::class, 'index'])->name('account.orders');
    Route::get('/konto/bestellungen/{order}', [OrderController::class, 'show'])->name('account.orders.show');
    Route::post('/konto/bestellungen/verfolgen', [OrderController::class, 'track'])->name('account.orders.track');

    // Course Payment Routes
    Route::get('/kurs/{id}', [CoursePaymentController::class, 'show'])->name('course.show');
    Route::post('/kurs/zahlung/erstellen', [CoursePaymentController::class, 'createPaymentIntent'])->name('course.payment.create');
    Route::get('/kurs/zahlung/erfolg', [CoursePaymentController::class, 'handleSuccess'])->name('course.payment.success');
    Route::get('/kurs/zahlung/stornieren', [CoursePaymentController::class, 'handleCancel'])->name('course.payment.cancel');
    Route::get('/kurs/{id}/download', [CoursePaymentController::class, 'download'])->name('course.download');

    // Cart Payment Routes
    Route::post('/warenkorb/zahlung/erstellen', [CartPaymentController::class, 'createPaymentIntent'])->name('cart.payment.create-intent');
    Route::get('/warenkorb/zahlung/erfolg', [CartPaymentController::class, 'handleSuccess'])->name('cart.payment.success');
    Route::get('/warenkorb/zahlung/stornieren', [CartPaymentController::class, 'handleCancel'])->name('cart.payment.cancel');

    Route::get('/konto/zahlungen', [LandingController::class, 'payments'])->name('account.payments');
});

// --------------------------------------------- Online Shop End---------------------------------------------

// Admin Product Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/armaturenbrett', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('produkte', ProductController::class)->names('products')->parameters([
        'produkte' => 'product'
    ]);

    // Notification Routes
    Route::get('/benachrichtigungen', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/benachrichtigungen/{notification}/mark-als-gelesen', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
    Route::post('/benachrichtigungen/alle-als-gelesen-markieren', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-as-read');
    Route::get('/benachrichtigungen/ungelesene-anzahl', [NotificationController::class, 'getUnreadCount'])->name('notifications.unread-count');
    Route::get('/benachrichtigungen/neueste', [NotificationController::class, 'getRecentNotifications'])->name('notifications.recent');

    // Order Management Routes
    Route::get('/bestellungen', [OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('/bestellungen/{order}', [OrderManagementController::class, 'show'])->name('orders.show');
    Route::post('/bestellungen/{order}/status', [OrderManagementController::class, 'updateStatus'])->name('orders.status');
    Route::post('/bestellungen/{order}/zahlungsstatus', [OrderManagementController::class, 'updatePaymentStatus'])->name('orders.payment-status');
    Route::post('/bestellungen/{order}/verfolgung', [OrderManagementController::class, 'updateTracking'])->name('orders.tracking');
    Route::delete('/bestellungen/{order}', [OrderManagementController::class, 'destroy'])->name('orders.destroy');

    // Booking Management Routes
    Route::get('/buchungen', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/buchungen/events', [BookingController::class, 'getEvents'])->name('bookings.events');
    Route::get('/buchungen/einladungen', [BookingController::class, 'getInvitees'])->name('bookings.invitees');
    Route::post('/buchungen', [BookingController::class, 'store'])->name('bookings.store');
    Route::put('/buchungen/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/buchungen/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::prefix('contents')->name('contents.')->group(function () {
        Route::get('/', [PageContentController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [PageContentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PageContentController::class, 'update'])->name('update');
    });

    Route::resource('dienstleistungen', ServiceManagementController::class)->names('services')->parameters([
        'dienstleistungen' => 'service'
    ]);
    Route::post('dienstleistungen/{service}/aktivieren', [ServiceManagementController::class, 'toggleActive'])->name('services.toggle-active');
    Route::post('dienstleistungen/{service}/hervorheben', [ServiceManagementController::class, 'toggleFeatured'])->name('services.toggle-featured');

    // Admin Profile Routes
    Route::get('/profil', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::put('/profil', [AdminProfileController::class, 'update'])->name('profile.update');
});

// Service Routes
Route::get('/dienstleistungen', [ServiceController::class, 'index'])->name('services');
Route::get('/preise', [ServiceController::class, 'prices'])->name('prices');
Route::get('/dienstleistungen/live-chat', [ServiceController::class, 'getLiveChatService'])->name('services.live-chat');
Route::get('/dienstleistungen/{id}', [ServiceController::class, 'show'])->name('service.show');


// Service Payment Routes
Route::post('/dienstleistungen/zahlung/erstellen', [ServiceController::class, 'createPaymentIntent'])->name('service.payment.create');
Route::get('/dienstleistungen/zahlung/erfolg', [ServiceController::class, 'handleSuccess'])->name('service.payment.success');
Route::get('/dienstleistungen/zahlung/stornieren', [ServiceController::class, 'handleCancel'])->name('service.payment.cancel');



require __DIR__ . '/auth.php';
