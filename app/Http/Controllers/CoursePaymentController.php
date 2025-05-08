<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
use App\Mail\CourseAccessEmail;
use App\Mail\CoursePurchaseMail;
use App\Notifications\CoursePurchased;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CoursePaymentController extends Controller
{
    protected $paypalProvider;

    public function __construct()
    {
        // Initialize PayPal
        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
        $this->paypalProvider->getAccessToken();
    }

    public function createPaymentIntent(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required|exists:courses,id',
                'payment_method' => 'required|in:stripe,paypal,twint',
                'email' => 'required_if:is_guest,true|email'
            ]);

            $course = Course::findOrFail($request->course_id);
            $amount = $course->price * 100; // Convert to cents

            // Handle guest user
            $user = auth()->user();
            if (!$user && $request->has('email')) {
                // Create or get guest user
                $user = User::firstOrCreate(
                    ['email' => $request->email],
                    [
                        'first_name' => 'Guest',
                        'last_name' => 'User',
                        'password' => Hash::make(Str::random(16)),
                        'role' => 'guest'
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
                        'course_id' => $course->id,
                        'course_name' => $course->title,
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
                        'course_id' => $course->id,
                        'course_name' => $course->title,
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
                    'return_url' => route('course.payment.success') . '?course_id=' . $course->id . '&payment_method=twint'
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
                            "invoice_id" => uniqid('COURSE-'),
                            "amount" => [
                                "currency_code" => "CHF",
                                "value" => number_format($course->price, 2, '.', ''),
                            ],
                            "description" => $course->title
                        ]
                    ],
                    "application_context" => [
                        "return_url" => route('course.payment.success') . '?course_id=' . $course->id,
                        "cancel_url" => route('course.payment.cancel'),
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
            Log::error('Course Payment Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleSuccess(Request $request)
    {
        try {
            $paymentMethod = $request->input('payment_method');
            $courseId = $request->input('course_id');

            if ($paymentMethod === 'stripe') {
                $paymentIntentId = $request->input('paymentIntentId');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('course', ['id' => $courseId])
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }

                $this->createCourseOrder($courseId, 'stripe', $paymentIntent->id, $paymentIntent->metadata->is_guest ?? false, $paymentIntent->metadata->user_id ?? null);
            } elseif ($paymentMethod === 'twint') {
                $paymentIntentId = $request->input('payment_intent');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);


                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('course', ['id' => $courseId])
                        ->with('error', 'TWINT Zahlung war nicht erfolgreich');
                }

                $this->createCourseOrder($courseId, 'twint', $paymentIntent->id, $paymentIntent->metadata->is_guest ?? false, $paymentIntent->metadata->user_id ?? null);
            } else {
                // PayPal success handling
                $provider = $this->paypalProvider;
                $response = $provider->capturePaymentOrder($request->token);

                if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                    $this->createCourseOrder($courseId, 'paypal', $response['id'], $paymentIntent->metadata->is_guest ?? false, $paymentIntent->metadata->user_id ?? null);
                } else {
                    return redirect()->route('course', ['id' => $courseId])
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }
            }

            return redirect()->route('course', ['id' => $courseId])
                ->with('success', 'Zahlung war erfolgreich. Du erhältst demnächst eine Mail mit dem weiteren Vorgehen.');
        } catch (\Exception $e) {
            Log::error('Course Payment Success Error: ' . $e->getMessage());
            return redirect()->route('course', ['id' => $courseId])
                ->with('error', 'Es kam zu einem Fehler während der Verarbeitung deiner Zahlung. Bitte kontaktiere mich.');
        }
    }

    public function handleCancel()
    {
        return redirect()->route('course')
            ->with('error', 'Zahlung wurde abgebrochen');
    }

    private function createCourseOrder($courseId, $paymentMethod, $transactionId, $isGuest = false, $userId = null)
    {
        try {
            DB::beginTransaction();

            $course = Course::findOrFail($courseId);
            $user = User::findOrFail($userId);

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'COURSE-' . strtoupper(uniqid()),
                'status' => 'completed',
                'payment_status' => 'completed',
                'payment_method' => $paymentMethod,
                'payment_id' => $transactionId,
                'total' => $course->price,
                'subtotal' => $course->price,
                'tax' => 0,
                'shipping_cost' => 0,
                'shipping_first_name' => $user->first_name,
                'shipping_last_name' => $user->last_name,
                'shipping_email' => $user->email,
                'shipping_phone' => '',
                'shipping_address' => '',
                'shipping_city' => '',
                'shipping_state' => '',
                'shipping_postal_code' => '',
                'shipping_country' => ''
            ]);

            // Create order item with download link in options
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $course->id,
                'quantity' => 1,
                'price' => $course->price,
                'name' => $course->title,
                'options' => [
                    'download_link' => $course->download_link
                ]
            ]);

            // Send course access email
            Mail::to($user->email)->send(new CourseAccessEmail($course, $order, $course->download_link));

            try {
                Mail::to(config('mail.admin_email'))->send(new CoursePurchaseMail(
                    $course,
                    $user,
                    $transactionId,
                    $paymentMethod
                ));
            } catch (\Exception $e) {
                \Log::error('Fehler beim Versand der E-Mail zum Kurskauf: ' . $e->getMessage());
            }

            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }

    public function download(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);
            $order = Order::where('id', $request->order)
                ->where('user_id', auth()->id())
                ->where('status', 'completed')
                ->firstOrFail();

            // Verify that the order contains this course
            $orderItem = OrderItem::where('order_id', $order->id)
                ->where('product_id', $course->id)
                ->firstOrFail();

            // Get the course materials
            $materials = $course->materials;
            if (empty($materials)) {
                return redirect()->back()->with('error', 'Keine Kursmaterialien zum herunterladen verfügbar');
            }

            // Create a zip file containing all course materials
            $zip = new \ZipArchive();
            $zipName = storage_path('app/public/courses/' . $course->slug . '_materials.zip');

            if ($zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
                foreach ($materials as $material) {
                    $filePath = storage_path('app/public/courses/' . $material);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($material));
                    }
                }
                $zip->close();
            }

            return response()->download($zipName, $course->slug . '_materials.zip')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Course Download Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ein Fehler kam zustande beim herunterladen der Kursmaterialien');
        }
    }

    public function index()
    {
        $courses = Course::active()->get();
        return view('pages.landing.course', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('pages.landing.course', compact('course'));
    }
}
