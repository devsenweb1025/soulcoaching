<x-landing-layout>
    @include('pages.landing._partials._background')

    <!--begin::Checkout Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Heading-->
                <div class="d-flex flex-column flex-center text-center py-10 py-lg-20 z-index-2 container">
                    <!--begin::Title-->
                    <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Bezahlung
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        </span>
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <div class="row g-5">

                    <!--begin::Bestellübersicht-->
                    <div class="col-lg-4">
                        <div class="card shadow card-borderless mb-5">
                            <div class="card-header">
                                <h3 class="card-title">Bestellübersicht</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                        <thead>
                                            <tr class="fw-bold text-muted bg-light">
                                                <th class="min-w-150px">Produkt</th>
                                                <th class="min-w-100px">Menge</th>
                                                <th class="min-w-100px">Preis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $id => $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50px me-5">
                                                                <img src="{{ asset('storage/' . $item['image']) }}"
                                                                    class="object-fit-contain"
                                                                    alt="{{ $item['name'] }}" />
                                                            </div>
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span
                                                                    class="text-dark fw-bold text-hover-primary fs-6">{{ $item['name'] }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item['quantity'] }}</td>
                                                    <td>@chf($item['price'])</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Zwischensumme:</span>
                                    <span class="text-dark fw-bold fs-5">@chf($total)</span>
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Versand:</span>
                                    <span class="text-dark fw-bold fs-5">@chf(session('shipping_cost', 11.5))</span>
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Total:</span>
                                    <span class="text-dark fw-bold fs-5">@chf($total + session('shipping_cost', 11.5))</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Bestellübersicht-->

                    <!--begin::Checkout Form-->
                    <div class="col-lg-8">
                        <div class="card shadow card-borderless mb-5">
                            <div class="card-header">
                                <h3 class="card-title">Versand- & Zahlungsinformationen</h3>
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

                                <!--begin::Authentication Options-->
                                <div class="mb-10">
                                    <h4 class="mb-5">Anmelden oder als Gast fortfahren</h4>

                                    @guest
                                        <div class="row g-5">
                                            <!--begin::Login-->
                                            <div class="col-md-4">
                                                <div class="card card-custom card-borderless">
                                                    <div class="card-body text-center">
                                                        <i class="ki-duotone ki-profile-user fs-2hx text-primary mb-5">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                        <h3 class="card-title">Bereits Kunde?</h3>
                                                        <p class="text-muted mb-5">Melden Sie sich an, um schneller zu bestellen</p>
                                                        <a href="{{ route('login') }}" class="btn btn-primary w-100">Anmelden</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Login-->

                                            <!--begin::Register-->
                                            <div class="col-md-4">
                                                <div class="card card-custom card-borderless">
                                                    <div class="card-body text-center">
                                                        <i class="ki-duotone ki-user-edit fs-2hx text-success mb-5">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <h3 class="card-title">Neukunde?</h3>
                                                        <p class="text-muted mb-5">Registrieren Sie sich für ein Konto</p>
                                                        <a href="{{ route('register') }}" class="btn btn-success w-100">Registrieren</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Register-->

                                            <!--begin::Guest-->
                                            <div class="col-md-4">
                                                <div class="card card-custom card-borderless">
                                                    <div class="card-body text-center">
                                                        <i class="ki-duotone ki-user-tick fs-2hx text-warning mb-5">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <h3 class="card-title">Als Gast bestellen</h3>
                                                        <p class="text-muted mb-5">Bestellen Sie ohne Registrierung</p>
                                                        <button type="button" class="btn btn-warning w-100" id="continue-as-guest">Als Gast fortfahren</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Guest-->
                                        </div>
                                    @else
                                        <div class="alert alert-info d-flex align-items-center p-5 mb-10">
                                            <i class="ki-duotone ki-profile-user fs-2hx text-info me-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">Angemeldet als: {{ auth()->user()->name }}</span>
                                                <span class="text-muted">Sie können jetzt mit Ihrer Bestellung fortfahren</span>
                                            </div>
                                        </div>
                                    @endguest
                                </div>
                                <!--end::Authentication Options-->

                                <form id="payment-form" action="{{ route('payment.paypal.create') }}" method="POST" style="display: none;">
                                    @csrf
                                    <!--begin::Versandinformationen-->
                                    <div class="mb-10">
                                        <h4 class="mb-5">Versandinformationen</h4>
                                        <div class="row g-5">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Vorname</label>
                                                <input type="text" name="first_name"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Name</label>
                                                <input type="text" name="last_name"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Telefonnummer</label>
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Strasse</label>
                                                <input type="text" name="address"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Ort</label>
                                                <input type="text" name="city"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Postleitzahl</label>
                                                <input type="text" name="postal_code"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Land</label>
                                                <select name="country" class="form-select form-select-solid" required>
                                                    <option value="CH">Schweiz</option>
                                                    <option value="DE">Deutschland</option>
                                                    <option value="AT">Österreich</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Versandinformationen-->

                                    <!--begin::Payment Information-->
                                    <div class="mb-10">
                                        <h4 class="mb-5">Zahlungsmethode</h4>

                                        <!--begin::Payment Methods-->
                                        <div class="mb-10">
                                            <label class="required fw-semibold fs-6 mb-4">Zahlungsmethode
                                                auswählen</label>
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
                                                                <span class="fw-semibold">Kredit- oder
                                                                    Debitkarte</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end::Stripe-->

                                                <!--begin::TWINT-->
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" value="twint" id="twint_payment" />
                                                        <label class="form-check-label" for="twint_payment">
                                                            <div class="d-flex align-items-center">
                                                                <span class="svg-icon svg-icon-2hx me-3">
                                                                    {!! get_svg_icon('svg/brand-logos/twint.svg') !!}
                                                                </span>
                                                                <span class="fw-semibold">TWINT</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end::TWINT-->
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
                                            <div id="paypal-errors" class="text-danger mt-2"></div>
                                        </div>
                                        <!--end::PayPal Form-->

                                        <!--begin::TWINT Form-->
                                        <div id="twint_form" style="display: none;">
                                            <div class="alert alert-info">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-information-5 fs-2hx text-info me-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Sie werden zu TWINT weitergeleitet, um Ihre Zahlung abzuschliessen.</span>
                                                        <span class="text-muted">Nach erfolgreicher Zahlung werden Sie zurück zu unserer Website geleitet.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="twint-errors" class="text-danger mt-2"></div>
                                        </div>
                                        <!--end::TWINT Form-->
                                    </div>
                                    <!--end::Payment Information-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('cart.index') }}" class="btn btn-light me-3">Zurück zum
                                            Warenkorb</a>
                                        <button type="submit" class="btn btn-primary" id="submit-button">
                                            <span class="indicator-label">Bestellung abschliessen</span>
                                            <span class="indicator-progress" style="display: none;">
                                                Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Initialize Stripe
    const stripe = Stripe('{{ config('services.stripe.key') }}', {
        locale: 'de'
    });
    const elements = stripe.elements();

    // Create card element
    const card = elements.create('card', {
        hidePostalCode: true,
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
                document.getElementById('twint_form').style.display = 'none';
            } else if (this.value === 'paypal') {
                document.getElementById('credit_card_form').style.display = 'none';
                document.getElementById('paypal_form').style.display = 'block';
                document.getElementById('twint_form').style.display = 'none';
            } else if (this.value === 'twint') {
                document.getElementById('credit_card_form').style.display = 'none';
                document.getElementById('paypal_form').style.display = 'none';
                document.getElementById('twint_form').style.display = 'block';
            }
        });
    });

    // Form submission
    const form = document.getElementById('payment-form');
    const submitButton = document.getElementById('submit-button');

    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        // Disable submit button and show loading state
        submitButton.disabled = true;
        submitButton.querySelector('.indicator-label').style.display = 'none';
        submitButton.querySelector('.indicator-progress').style.display = 'inline-block';

        const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

        try {
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
                throw new Error('Failed to store Versandinformationen');
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
                }
            } else if (paymentMethod === 'paypal') {
                try {
                    // Create PayPal order
                    const response = await fetch('{{ route('payment.paypal.create') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });

                    const {
                        orderId,
                        approvalUrl
                    } = await response.json();

                    if (orderId && approvalUrl) {
                        window.location.href = approvalUrl;
                    } else {
                        throw new Error('Erstellung der PayPal-Bestellung fehlgeschlagen');
                    }
                } catch (error) {
                    const errorElement = document.getElementById('paypal-errors');
                    errorElement.textContent = error.message;
                }
            } else if (paymentMethod === 'twint') {
                try {
                    // Create TWINT payment intent
                    const response = await fetch('{{ route('cart.payment.create-intent') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            payment_method: 'twint'
                        })
                    });

                    const data = await response.json();

                    if (data.error) {
                        throw new Error(data.error);
                    }

                    if (data.redirectUrl) {
                        window.location.href = data.redirectUrl;
                    } else {
                        throw new Error('TWINT Zahlung konnte nicht initialisiert werden');
                    }
                } catch (error) {
                    const errorElement = document.getElementById('twint-errors');
                    errorElement.textContent = error.message;
                }
            }
        } catch (error) {
            // Show error message in appropriate error element based on payment method
            const errorElement = document.getElementById(`${paymentMethod}-errors`);
            if (errorElement) {
                errorElement.textContent = error.message;
            } else {
                // If no specific error element found, show in a general alert
                Swal.fire({
                    text: error.message || 'Ein Fehler ist beim Bezahlvorgang aufgetreten',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Weiter!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            }
        } finally {
            // Re-enable submit button and hide loading state
            submitButton.disabled = false;
            submitButton.querySelector('.indicator-label').style.display = 'inline-block';
            submitButton.querySelector('.indicator-progress').style.display = 'none';
        }
    });

    // Handle guest checkout
    document.getElementById('continue-as-guest')?.addEventListener('click', function() {
        document.getElementById('payment-form').style.display = 'block';
        this.closest('.mb-10').style.display = 'none';
    });

    // Show payment form if user is logged in
    @auth
        document.getElementById('payment-form').style.display = 'block';
    @endauth
</script>
