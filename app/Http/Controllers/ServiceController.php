<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Mail\ServiceAccessEmail;

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
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('pages.landing.services', compact('services'));
    }

    public function prices()
    {
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('pages.landing.prices', compact('services'));
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
                'id' => 'required',
                'type' => 'required|in:service',
                'payment_method' => 'required|in:stripe,paypal'
            ]);

            $service = Service::findOrFail($request->id);
            $amount = $service->price * 100; // Convert to cents

            if ($request->payment_method === 'stripe') {
                Stripe::setApiKey(config('services.stripe.secret'));

                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['card'],
                    'metadata' => [
                        'user_id' => auth()->id(),
                        'service_id' => $service->id,
                        'service_name' => $service->name
                    ]
                ]);

                return response()->json([
                    'clientSecret' => $paymentIntent->client_secret,
                    'paymentIntentId' => $paymentIntent->id
                ]);
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
                            "description" => $service->name
                        ]
                    ],
                    "application_context" => [
                        "return_url" => route('service.payment.success') . '?id=' . $service->id . '&type=service',
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

                return response()->json(['error' => 'Failed to create PayPal order'], 500);
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
            $serviceId = $request->input('id');

            if ($paymentMethod === 'stripe') {
                $paymentIntentId = $request->input('paymentIntentId');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('prices')
                        ->with('error', 'Payment was not successful');
                }

                $this->createServiceOrder($serviceId, 'stripe', $paymentIntent->id);
            } else {
                // PayPal success handling
                $provider = $this->paypalProvider;
                $response = $provider->capturePaymentOrder($request->token);

                if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                    $this->createServiceOrder($serviceId, 'paypal', $response['id']);
                } else {
                    return redirect()->route('prices')
                        ->with('error', 'Payment was not successful');
                }
            }

            return redirect()->route('prices')
                ->with('success', 'Payment successful! You will receive an email with your service details shortly.');
        } catch (\Exception $e) {
            Log::error('Service Payment Success Error: ' . $e->getMessage());
            return redirect()->route('prices')
                ->with('error', 'An error occurred while processing your payment. Please contact support.');
        }
    }

    public function handleCancel()
    {
        return redirect()->route('prices')
            ->with('error', 'Payment was cancelled.');
    }

    private function createServiceOrder($serviceId, $paymentMethod, $transactionId)
    {
        try {
            DB::beginTransaction();

            $service = Service::findOrFail($serviceId);
            $user = auth()->user();

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
                'shipping_first_name' => $user->first_name,
                'shipping_last_name' => $user->last_name,
                'shipping_email' => $user->email,
                'shipping_phone' => '',
                'shipping_address' => null,
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
                'name' => $service->name,
                'options' => [
                    'description' => $service->description,
                    'duration' => $service->duration,
                    'location' => $service->location
                ]
            ]);

            // Send service access email
            Mail::to($user->email)->send(new ServiceAccessEmail($service, $order));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
