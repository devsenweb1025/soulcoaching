<x-landing-layout>
    @include('pages.landing._partials._background')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-350px px-9">
        <div class="cloud">
            <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
                data-framer-background-image-wrapper="true">
                <img decoding="async" loading="lazy"
                    src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png" alt=""
                    style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
            </div>
        </div>
        <!--begin::Heading-->
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Checkout
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Checkout Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <div class="row g-5">
                    <!--begin::Order Summary-->
                    <div class="col-lg-4">
                        <div class="card shadow card-borderless mb-5">
                            <div class="card-header">
                                <h3 class="card-title">Order Summary</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                        <thead>
                                            <tr class="fw-bold text-muted bg-light">
                                                <th class="min-w-150px">Product</th>
                                                <th class="min-w-100px">Quantity</th>
                                                <th class="min-w-100px">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50px me-5">
                                                                <img src="{{ $item->options->image }}" class=""
                                                                    alt="" />
                                                            </div>
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span
                                                                    class="text-dark fw-bold text-hover-primary fs-6">{{ $item->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>CHF {{ number_format($item->price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Subtotal:</span>
                                    <span class="text-dark fw-bold fs-5">CHF
                                        {{ number_format(Cart::subtotal(), 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Tax (7.7%):</span>
                                    <span class="text-dark fw-bold fs-5">CHF {{ number_format(Cart::tax(), 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Total:</span>
                                    <span class="text-dark fw-bold fs-5">CHF
                                        {{ number_format(Cart::total(), 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Order Summary-->

                    <!--begin::Checkout Form-->
                    <div class="col-lg-8">
                        <div class="card shadow card-borderless mb-5">
                            <div class="card-header">
                                <h3 class="card-title">Shipping & Payment Information</h3>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-{{ session('status') }} alert-dismissible fade show"
                                        role="alert">
                                        {{ session('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form id="payment-form" action="{{ route('payment.paypal.create') }}" method="POST">
                                    @csrf
                                    <!--begin::Shipping Information-->
                                    <div class="mb-10">
                                        <h4 class="mb-5">Shipping Information</h4>
                                        <div class="row g-5">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">First Name</label>
                                                <input type="text" name="first_name"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Last Name</label>
                                                <input type="text" name="last_name"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Phone</label>
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Address</label>
                                                <input type="text" name="address"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">City</label>
                                                <input type="text" name="city"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Postal Code</label>
                                                <input type="text" name="postal_code"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Country</label>
                                                <select name="country" class="form-select form-select-solid" required>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="AT">Austria</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Shipping Information-->

                                    <!--begin::Payment Information-->
                                    <div class="mb-10">
                                        <h4 class="mb-5">Payment Information</h4>

                                        <!--begin::Payment Methods-->
                                        <div class="mb-10">
                                            <label class="required fw-semibold fs-6 mb-4">Select Payment Method</label>
                                            <div class="row g-5">
                                                <!--begin::Stripe-->
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" value="stripe" id="stripe_payment"
                                                            checked />
                                                        <label class="form-check-label" for="stripe_payment">
                                                            <div class="d-flex align-items-center">
                                                                <span class="svg-icon svg-icon-2hx me-3">
                                                                    {!! get_svg_icon('svg/card-logos/visa.svg') !!}
                                                                    {!! get_svg_icon('svg/card-logos/mastercard.svg') !!}
                                                                </span>
                                                                <span class="fw-semibold">Credit Card</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end::Stripe-->

                                                <!--begin::PayPal-->
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" value="paypal"
                                                            id="paypal_payment" />
                                                        <label class="form-check-label" for="paypal_payment">
                                                            <div class="d-flex align-items-center">
                                                                <span class="svg-icon svg-icon-2hx me-3">
                                                                    {!! get_svg_icon('svg/brand-logos/paypal.svg') !!}
                                                                </span>
                                                                <span class="fw-semibold">PayPal</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end::PayPal-->
                                            </div>
                                        </div>
                                        <!--end::Payment Methods-->

                                        <!--begin::Credit Card Form-->
                                        <div id="credit_card_form">
                                            <div id="card-element"></div>
                                            <div id="card-errors" class="text-danger mt-2"></div>
                                        </div>
                                        <!--end::Credit Card Form-->

                                        <!--begin::PayPal Form-->
                                        <div id="paypal_form" style="display: none;">
                                            <div class="alert alert-info">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-information-5 fs-2hx text-info me-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">You will be redirected to PayPal to
                                                            complete your payment.</span>
                                                        <span class="text-muted">After successful payment, you will be
                                                            redirected back to our site.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::PayPal Form-->
                                    </div>
                                    <!--end::Payment Information-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('cart.index') }}" class="btn btn-light me-3">Back to
                                            Cart</a>
                                        <button type="submit" class="btn btn-primary" id="submit-button">
                                            <span class="indicator-label">Place Order</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Checkout Form-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Checkout Section-->
</x-landing-layout>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Initialize Stripe
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();

        // Create card element
        const card = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            }
        });

        // Mount card element
        card.mount('#card-element');

        // Handle card errors
        card.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Payment method toggle
        document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'stripe') {
                    document.getElementById('credit_card_form').style.display = 'block';
                    document.getElementById('paypal_form').style.display = 'none';
                } else if (this.value === 'paypal') {
                    document.getElementById('credit_card_form').style.display = 'none';
                    document.getElementById('paypal_form').style.display = 'block';
                }
            });
        });

        // Form submission
        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            // Disable submit button
            submitButton.disabled = true;
            submitButton.querySelector('.indicator-label').style.display = 'none';
            submitButton.querySelector('.indicator-progress').style.display = 'inline-block';

            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            // Store shipping info in session
            const shippingResponse = await fetch('{{ route('cart.store-shipping-info') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    first_name: form.querySelector('[name="first_name"]').value,
                    last_name: form.querySelector('[name="last_name"]').value,
                    email: form.querySelector('[name="email"]').value,
                    phone: form.querySelector('[name="phone"]').value,
                    address: form.querySelector('[name="address"]').value,
                    city: form.querySelector('[name="city"]').value,
                    postal_code: form.querySelector('[name="postal_code"]').value,
                    country: form.querySelector('[name="country"]').value
                })
            });

            if (!shippingResponse.ok) {
                throw new Error('Failed to store shipping information');
            }

            if (paymentMethod === 'stripe') {
                try {
                    // Create payment intent
                    const response = await fetch('{{ route('stripe.create-payment-intent') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });

                    const {
                        clientSecret
                    } = await response.json();

                    // Confirm payment
                    const {
                        paymentIntent,
                        error
                    } = await stripe.confirmCardPayment(clientSecret, {
                        payment_method: {
                            card: card,
                            billing_details: {
                                name: form.querySelector('[name="first_name"]').value + ' ' + form
                                    .querySelector('[name="last_name"]').value,
                                email: form.querySelector('[name="email"]').value,
                                phone: form.querySelector('[name="phone"]').value,
                                address: {
                                    line1: form.querySelector('[name="address"]').value,
                                    city: form.querySelector('[name="city"]').value,
                                    postal_code: form.querySelector('[name="postal_code"]').value,
                                    country: form.querySelector('[name="country"]').value
                                }
                            }
                        }
                    });

                    if (error) {
                        throw new Error(error.message);
                    }
                    // Redirect to success page
                    window.location.href = '{{ route('stripe.success') }}?payment_intent=' + paymentIntent.id;
                } catch (error) {
                    // Show error message
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;

                    // Re-enable submit button
                    submitButton.disabled = false;
                    submitButton.querySelector('.indicator-label').style.display = 'inline-block';
                    submitButton.querySelector('.indicator-progress').style.display = 'none';
                }
            } else if (paymentMethod === 'paypal') {
                // Submit form to PayPal route
                form.submit();
            }
        });
    </script>
