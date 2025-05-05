<x-landing-layout>
    @include('pages.landing._partials._background')

    <!--begin::Payments Section-->
    <div class="mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="d-flex flex-column flex-center text-center py-10 py-lg-20 z-index-2 container">
                    <!--begin::Title-->
                    <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Zahlung vornehmen
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        </span>
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Payments Card-->
                <div class="card shadow card-borderless mb-5">
                    <div class="card-body">
                        @if ($services->isEmpty())
                            <div class="text-center py-10">
                                <div class="mb-5">
                                    <i class="ki-duotone ki-credit-cart fs-4x text-gray-400">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <h3 class="text-gray-800 mb-2">Keine Services verfügbar</h3>
                                <p class="text-gray-500">Aktuell sind keine Services zum Bezahlen verfügbar.</p>
                            </div>
                        @else
                            @foreach ($services as $index => $service)
                                <div class="d-flex flex-column mb-10">
                                    <div class="d-flex flex-column flex-md-row align-items-center">
                                        <div class="col-md-8">
                                            <h4 class="mb-3">{{ $service->title }}</h4>
                                            <p class="text-gray-600">{{ $service->description }}</p>
                                            <div class="d-flex flex-column">
                                                <span class="fs-2x fw-bold text-primary mb-2">
                                                    @chf($service->price).-
                                                    @if ($service->benefit_option === 'month')
                                                        / Monat
                                                    @elseif($service->benefit_option === 'hour')
                                                        / Stunde
                                                    @elseif($service->benefit_option === 'min')
                                                        / Minute
                                                    @elseif($service->benefit_option === 'per call')
                                                        / pro Gespräch
                                                    @endif
                                                </span>
                                                @if ($service->features)
                                                    <div class="d-flex flex-column gap-2 mt-3">
                                                        @foreach ($service->features as $feature)
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-check-circle fs-2 text-success me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                <span class="text-gray-700">{{ $feature }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-5 mt-md-0">
                                            <div class="d-flex flex-column gap-3">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="showStripeForm('{{ $service->id }}', '{{ $index }}')">
                                                    <i class="ki-duotone ki-credit-cart fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Mit Karte bezahlen
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="initiatePayment('twint', '{{ $service->id }}')"
                                                    id="twint-button-{{ $service->id }}">
                                                    <i class="ki-duotone ki-wallet fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="indicator-label">Mit TWINT bezahlen</span>
                                                    <span class="indicator-progress" style="display: none;">
                                                        Bitte warten... <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>

                                            <!-- Stripe Card Form -->
                                            <div id="stripe-form-{{ $index }}" class="mt-4 w-100" style="display: none;">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">Zahlungsdaten angeben</h5>
                                                        <form id="payment-form-{{ $index }}">
                                                            <div class="mb-3">
                                                                <label for="card-element-{{ $index }}"
                                                                    class="form-label">Kredit- oder Debitkarte</label>
                                                                <div id="card-element-{{ $index }}" class="form-control">
                                                                    <!-- Stripe Card Element will be inserted here -->
                                                                </div>
                                                                <div id="card-errors-{{ $index }}" class="text-danger mt-2"
                                                                    role="alert"></div>
                                                            </div>
                                                            <div class="d-flex gap-2">
                                                                <button type="submit" class="btn btn-primary"
                                                                    id="submit-button-{{ $index }}">
                                                                    <span class="indicator-label">Jetzt bezahlen</span>
                                                                    <span class="indicator-progress" style="display: none;">
                                                                        Bitte warten... <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                    </span>
                                                                </button>
                                                                <button type="button" class="btn btn-light"
                                                                    onclick="hideStripeForm('{{ $index }}')">Abbrechen</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <div class="separator my-10"></div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <!--end::Payments Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Payments Section-->
</x-landing-layout>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}', {
        locale: 'de'
    });

    const elements = stripe.elements();
    let card;
    let currentFormIndex = null;

    // Show success/error messages if they exist
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                text: '{{ session('success') }}',
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Weiter!",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                text: '{{ session('error') }}',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Weiter!",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        @endif
    });

    // Create card element
    function initializeCard() {
        if (!card) {
            card = elements.create('card', {
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
                },
                hidePostalCode: true
            });
        }
    }

    // Show Stripe form
    function showStripeForm(serviceId, index) {
        // Hide all other forms first
        document.querySelectorAll('[id^="stripe-form-"]').forEach(form => {
            form.style.display = 'none';
        });

        const form = document.getElementById(`stripe-form-${index}`);
        form.style.display = 'block';

        // Initialize card if not already done
        initializeCard();

        // Unmount from previous container if exists
        if (currentFormIndex !== null) {
            card.unmount();
        }

        // Mount to new container
        card.mount(`#card-element-${index}`);
        currentFormIndex = index;

        document.getElementById(`payment-form-${index}`).dataset.serviceId = serviceId;
    }

    // Hide Stripe form
    function hideStripeForm(index) {
        document.getElementById(`stripe-form-${index}`).style.display = 'none';
        if (currentFormIndex === index) {
            card.unmount();
            currentFormIndex = null;
        }
    }

    // Handle form submission
    document.querySelectorAll('[id^="payment-form-"]').forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const index = this.id.split('-')[2];
            const submitButton = document.getElementById(`submit-button-${index}`);
            const serviceId = this.dataset.serviceId;

            // Disable submit button
            submitButton.disabled = true;
            submitButton.querySelector('.indicator-label').style.display = 'none';
            submitButton.querySelector('.indicator-progress').style.display = 'inline-block';

            try {
                const response = await fetch('{{ route('service.payment.create') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        service_id: serviceId,
                        payment_method: 'stripe'
                    })
                });

                const data = await response.json();

                if (data.error) {
                    throw new Error(data.error);
                }

                const {
                    error
                } = await stripe.confirmCardPayment(data.clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: '{{ auth()->user()->name }}',
                            email: '{{ auth()->user()->email }}'
                        }
                    }
                });

                if (error) {
                    throw new Error(error.message);
                }

                window.location.href =
                    '{{ route('service.payment.success') }}?payment_method=stripe&service_id=' +
                    serviceId + '&paymentIntentId=' + data.paymentIntentId;
            } catch (error) {
                Swal.fire({
                    text: error.message || 'Ein Fehler ist beim Bezahlvorgang aufgetreten',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Weiter!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.querySelector('.indicator-label').style.display = 'inline-block';
                submitButton.querySelector('.indicator-progress').style.display = 'none';
            }
        });
    });

    // Handle TWINT payment
    async function initiatePayment(paymentMethod, serviceId) {
        if (paymentMethod === 'stripe') {
            showStripeForm(serviceId);
            return;
        }

        const twintButton = document.getElementById(`twint-button-${serviceId}`);
        if (twintButton) {
            twintButton.disabled = true;
            twintButton.querySelector('.indicator-label').style.display = 'none';
            twintButton.querySelector('.indicator-progress').style.display = 'inline-block';
        }

        try {
            const response = await fetch('{{ route('service.payment.create') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    service_id: serviceId,
                    payment_method: paymentMethod
                })
            });

            const data = await response.json();

            if (data.error) {
                throw new Error(data.error);
            }

            if (paymentMethod === 'twint') {
                if (data.redirectUrl) {
                    window.location.href = data.redirectUrl;
                }
            } else {
                window.location.href = data.approvalUrl;
            }
        } catch (error) {
            Swal.fire({
                text: error.message || 'Ein Fehler ist beim Bezahlvorgang aufgetreten',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Weiter!",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        } finally {
            if (twintButton) {
                twintButton.disabled = false;
                twintButton.querySelector('.indicator-label').style.display = 'inline-block';
                twintButton.querySelector('.indicator-progress').style.display = 'none';
            }
        }
    }
</script>
