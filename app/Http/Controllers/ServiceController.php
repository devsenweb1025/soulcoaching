<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Mail\ServiceAccessEmail;
use App\Mail\ServicePurchaseMail;
use App\Notifications\ServicePurchased;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    protected $paypalProvider;

    public function __construct()
    {
        // Initialize PayPal
        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
        $this->paypalProvider->getAccessToken();
    }

    public function index()
    {
        $services = Service::where('is_active', true)
            ->where('is_live_chat', false)
            ->orderBy('sort_order', 'asc')
            ->get();
        return view('pages.landing.services', compact('services'));
    }

    public function prices()
    {
        $services = Service::where('is_active', true)
            ->where('is_live_chat', false)
            ->orderBy('sort_order', 'asc')
            ->get();
        return view('pages.landing.prices', compact('services'));
    }

    public function getLiveChatService()
    {
        $services = Service::where('is_active', true)
            ->where('is_live_chat', true)
            ->orderBy('sort_order', 'asc')
            ->first();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('pages.landing.service-details', compact('service'));
    }

    public function createPaymentIntent(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required',
                'payment_method' => 'required|in:stripe,paypal,twint',
                'email' => 'required_if:is_guest,true|email'
            ]);

            $service = Service::findOrFail($request->service_id);
            $amount = $service->price * 100; // Convert to cents

            // Get or create guest user if not authenticated
            $user = auth()->user();
            if (!$user && $request->email) {
                $user = User::firstOrCreate(
                    ['email' => $request->email],
                    [
                        'first_name' => 'Guest',
                        'last_name' => 'User',
                        'password' => Hash::make(Str::random(24)),
                    ]
                );
            }

            if ($request->payment_method === 'stripe') {
                Stripe::setApiKey(config('services.stripe.secret'));

                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['card'],
                    'metadata' => [
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'service_name' => $service->title,
                        'is_guest' => !auth()->check()
                    ]
                ]);

                return response()->json([
                    'clientSecret' => $paymentIntent->client_secret,
                    'paymentIntentId' => $paymentIntent->id
                ]);
            } elseif ($request->payment_method === 'twint') {
                Stripe::setApiKey(config('services.stripe.secret'));

                // Create a payment intent with TWINT as the payment method
                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['twint'],
                    'metadata' => [
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'service_name' => $service->title,
                        'is_guest' => !auth()->check()
                    ]
                ]);

                // Create a payment method for TWINT
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'twint',
                    'billing_details' => [
                        'name' => $user->first_name . ' ' . $user->last_name,
                        'email' => $user->email
                    ]
                ]);

                // Attach the payment method to the payment intent
                $paymentIntent = PaymentIntent::update($paymentIntent->id, [
                    'payment_method' => $paymentMethod->id
                ]);

                // Confirm the payment intent to get the QR code
                $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntent->id);
                $paymentIntent->confirm([
                    'return_url' => route('service.payment.success') . '?service_id=' . $service->id . '&payment_method=twint'
                ]);

                // Check if the payment intent requires action and has a QR code
                if ($paymentIntent->status === 'requires_action' &&
                    isset($paymentIntent->next_action) &&
                    isset($paymentIntent->next_action->redirect_to_url) &&
                    isset($paymentIntent->next_action->redirect_to_url->url)) {

                    $redirectUrl = $paymentIntent->next_action->redirect_to_url->url;

                    return response()->json([
                        'redirectUrl' => $redirectUrl,
                        'paymentIntentId' => $paymentIntent->id,
                        'clientSecret' => $paymentIntent->client_secret,
                        'status' => 'requires_action'
                    ]);
                }

                // If no QR code is available, return an error
                return response()->json([
                    'error' => 'QR-Code konnte nicht generiert werden. Bitte versuchen Sie es später erneut.',
                    'status' => 'error'
                ], 400);
            } else {
                // PayPal payment
                $order = [
                    "intent" => "CAPTURE",
                    "purchase_units" => [
                        [
                            "invoice_id" => uniqid('SERVICE-'),
                            "amount" => [
                                "currency_code" => "CHF",
                                "value" => number_format($service->price, 2, '.', ''),
                            ],
                            "description" => $service->title
                        ]
                    ],
                    "application_context" => [
                        "return_url" => route('service.payment.success') . '?service_id=' . $service->id,
                        "cancel_url" => route('service.payment.cancel'),
                        "user_action" => "PAY_NOW"
                    ]
                ];

                $response = $this->paypalProvider->createOrder($order);

                if (isset($response['id']) && $response['id'] != null) {
                    foreach ($response['links'] as $links) {
                        if ($links['rel'] == 'approve') {
                            return response()->json([
                                'orderId' => $response['id'],
                                'approvalUrl' => $links['href'],
                            ]);
                        }
                    }
                }

                return response()->json(['error' => 'Erstellung der PayPal-Bestellung fehlgeschlagen'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Service Payment Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleSuccess(Request $request)
    {
        try {
            $paymentMethod = $request->input('payment_method');
            $serviceId = $request->input('service_id');
            $service = Service::findOrFail($serviceId);

            if ($paymentMethod === 'stripe') {
                $paymentIntentId = $request->input('paymentIntentId');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('prices')
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }

                $this->createServiceOrder($serviceId, 'stripe', $paymentIntent->id, $paymentIntent->metadata->is_guest ?? false, $paymentIntent->metadata->user_id ?? null);
            } elseif ($paymentMethod === 'twint') {
                $paymentIntentId = $request->input('payment_intent');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('prices')
                        ->with('error', 'TWINT Zahlung war nicht erfolgreich');
                }

                $this->createServiceOrder($serviceId, 'twint', $paymentIntent->id, $paymentIntent->metadata->is_guest ?? false, $paymentIntent->metadata->user_id ?? null);
            } else {
                // PayPal success handling
                $provider = $this->paypalProvider;
                $response = $provider->capturePaymentOrder($request->token);

                if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                    $this->createServiceOrder($serviceId, 'paypal', $response['id'], false, null);
                } else {
                    return redirect()->route('prices')
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }
            }

            // Check if the service is a live chat service
            if ($service->is_live_chat) {
                // Get user's phone number from the order
                $order = Order::where('payment_id', $paymentIntentId ?? $response['id'])->first();
                $user = $order->user;

                // Create WhatsApp message with order details
                $message = urlencode("Hallo! Ich habe gerade die Live Chat Beratung gebucht. Meine Bestellnummer ist: {$order->order_number}");

                // Redirect to WhatsApp
                return redirect()->away("https://api.whatsapp.com/send?phone=41798227602&text={$message}");
            }

            return redirect()->route('prices')
                ->with('success', 'Zahlung war erfolgreich. Du erhältst demnächst eine Mail mit dem weiteren Vorgehen.');
        } catch (\Exception $e) {
            Log::error('Service Payment Success Error: ' . $e->getMessage());
            return redirect()->route('prices')
                ->with('error', 'Es kam zu einem Fehler während der Verarbeitung deiner Zahlung. Bitte kontaktiere mich.');
        }
    }

    public function handleCancel()
    {
        return redirect()->route('prices')
            ->with('error', 'Zahlung wurde abgebrochen');
    }

    private function createServiceOrder($serviceId, $paymentMethod, $transactionId, $isGuest = false, $userId = null)
    {
        try {
            DB::beginTransaction();

            $service = Service::findOrFail($serviceId);
            $user = auth()->user();

            if ($isGuest) {
                // Get the guest user from the payment intent metadata
                $user = User::find($userId);
            }

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'SERVICE-' . strtoupper(uniqid()),
                'status' => 'completed',
                'payment_status' => 'completed',
                'payment_method' => $paymentMethod,
                'payment_id' => $transactionId,
                'total' => $service->price,
                'subtotal' => $service->price,
                'tax' => 0,
                'shipping_cost' => 0,
                'shipping_first_name' => $user->first_name ?? 'Guest',
                'shipping_last_name' => $user->last_name ?? 'User',
                'shipping_email' => $user->email,
                'shipping_phone' => '',
                'shipping_address' => '',
                'shipping_city' => '',
                'shipping_state' => '',
                'shipping_postal_code' => '',
                'shipping_country' => '',
            ]);

            // Create order item with service details in options
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $service->id,
                'product_type' => 'service',
                'quantity' => 1,
                'price' => $service->price,
                'name' => $service->title,
                'options' => [
                    'description' => $service->description,
                    'duration' => $service->duration,
                    'location' => $service->location
                ]
            ]);

            // Send service access email
            Mail::to($user->email)->send(new ServiceAccessEmail($service, $order, $user));

            try {
                Mail::to(config('mail.admin_email'))->send(new ServicePurchaseMail(
                    $service,
                    $user,
                    $transactionId,
                    $paymentMethod
                ));
            } catch (\Exception $e) {
                \Log::error('Fehler beim Versand der E-Mail zum Servicekauf ' . $e->getMessage());
            }

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            throw $e;
        }
    }
}
