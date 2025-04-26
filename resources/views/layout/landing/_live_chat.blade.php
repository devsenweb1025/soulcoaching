<!--begin::Live Chat Section-->
<div class="position-fixed bottom-0 end-0 z-index-3">
    <!-- Live Chat Box -->
    <div id="liveChatBox" class="card shadow-lg mb-5 me-5 d-none" style="width: 350px;">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-40px me-3" data-bs-toggle="tooltip" title="Seelenflüsterin Sarah">
                        @php
                            $service = \App\Models\Service::where('is_live_chat', true)->first();
                        @endphp
                        <img src="{{ asset('storage/' . $service->image) }}" class="rounded-circle"
                            alt="Seelenflüsterin Sarah">
                    </div>
                    <div class="card-title">
                        <h3 class="fw-bold text-gray-800">{{ $service->title }}</h3>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" id="closeChatBox">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column gap-5">
                <!-- Service Description -->
                <div class="service-description">
                    <p class="text-gray-600 fs-6" id="liveChatDescription">
                        @if ($service)
                            {{ $service->description }}
                        @else
                            Live Chat Beratung mit Seelenflüsterin Sarah
                        @endif
                    </p>


                    <!-- Payment Buttons -->
                    <div class="d-flex flex-column gap-3">
                        <button type="button" class="btn btn-light-primary w-100" id="showStripeFormBtn">
                            <i class="ki-duotone ki-credit-cart fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Mit Karte bezahlen
                        </button>


                        <!-- Stripe Card Form -->
                        <div id="stripeForm" class="mt-4 w-100" style="display: none;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Zahlungsdaten angeben</h5>
                                    <form id="paymentForm">
                                        <div class="mb-3">
                                            <label for="cardElement" class="form-label">Kredit- oder Debitkarte</label>
                                            <div id="cardElement" class="form-control">
                                                <!-- Stripe Card Element will be inserted here -->
                                            </div>
                                            <div id="cardErrors" class="text-danger mt-2" role="alert"></div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary" id="submitButton">
                                                <span class="indicator-label">Jetzt bezahlen</span>
                                                <span class="indicator-progress" style="display: none;">
                                                    Bitte warten... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-light"
                                                id="cancelStripeForm">Abbrechen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-light-primary w-100" id="twintPaymentBtn">
                            <i class="ki-duotone ki-abstract-26 fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span class="indicator-label">Mit TWINT bezahlen</span>
                            <span class="indicator-progress" style="display: none;">
                                Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Button -->
    <button id="liveChatToggle" class="btn btn-icon position-relative bg-primary rounded-circle">
        <!-- Chat icon (shown when closed) -->
        {!! theme()->getIcon('message-text', 'fs-2tx text-white live-chat-open', 'solid') !!}
        <!-- Close icon (shown when open) -->
        {!! theme()->getIcon('cross', 'fs-2tx text-white live-chat-close d-none', 'solid') !!}
    </button>
</div>
<!--end::Live Chat Section-->

<style>
    #liveChatToggle {
        right: 14px;
        bottom: 14px;
        width: 54px;
        height: 54px;
    }

    #liveChatBox {
        position: fixed;
        right: 0px;
        bottom: 70px;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .live-chat-open {
        display: inline-block;
    }

    .live-chat-close {
        display: none;
    }

    #liveChatBox.show {
        display: block !important;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .service-description {
        max-height: 350px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .service-description::-webkit-scrollbar {
        width: 6px;
    }

    .service-description::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .service-description::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    .service-description::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatToggle = document.getElementById('liveChatToggle');
        const chatBox = document.getElementById('liveChatBox');
        const closeChatBox = document.getElementById('closeChatBox');
        const twintPaymentBtn = document.getElementById('twintPaymentBtn');
        const showStripeFormBtn = document.getElementById('showStripeFormBtn');
        const stripeForm = document.getElementById('stripeForm');
        const cancelStripeForm = document.getElementById('cancelStripeForm');
        const paymentForm = document.getElementById('paymentForm');
        const submitButton = document.getElementById('submitButton');

        // Initialize Stripe
        const stripe = Stripe('{{ config('services.stripe.key') }}', {
            locale: 'de'
        });
        const elements = stripe.elements();
        let card;

        // Initialize card element
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
                card.mount('#cardElement');
            }
        }

        // Show Stripe form
        showStripeFormBtn.addEventListener('click', function() {
            if (!checkAuth()) return;
            stripeForm.style.display = 'block';
            initializeCard();
        });

        // Hide Stripe form
        cancelStripeForm.addEventListener('click', function() {
            stripeForm.style.display = 'none';
            if (card) {
                card.unmount();
                card = null;
            }
        });

        // Handle form submission
        paymentForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Disable submit button
            submitButton.disabled = true;
            submitButton.querySelector('.indicator-label').style.display = 'none';
            submitButton.querySelector('.indicator-progress').style.display = 'inline-block';

            try {
                // Get the live chat service
                const response = await fetch('{{ route('services.live-chat') }}');
                const data = await response.json();

                if (data.success && data.data) {
                    const service = data.data;

                    // Create payment intent
                    const paymentResponse = await fetch('{{ route('service.payment.create') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            service_id: service.id,
                            payment_method: 'stripe'
                        })
                    });

                    const paymentData = await paymentResponse.json();

                    if (paymentData.error) {
                        throw new Error(paymentData.error);
                    }

                    const {
                        error
                    } = await stripe.confirmCardPayment(paymentData.clientSecret, {
                        payment_method: {
                            card: card,
                            billing_details: {
                                name: '{{ isset(auth()->user()->name) ? auth()->user()->name : '' }}',
                                email: '{{ isset(auth()->user()->email) ? auth()->user()->email : '' }}'
                            }
                        }
                    });

                    if (error) {
                        throw new Error(error.message);
                    }

                    window.location.href =
                        '{{ route('service.payment.success') }}?payment_method=stripe&service_id=' +
                        service.id + '&paymentIntentId=' + paymentData.paymentIntentId;
                }
            } catch (error) {
                Swal.fire({
                    text: error.message ||
                        'An error occurred while processing your payment',
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

        // Toggle chat box
        chatToggle.addEventListener('click', function() {
            chatBox.classList.toggle('d-none');
            chatBox.classList.toggle('show');

            // Toggle icons
            const openIcon = document.querySelector('.live-chat-open');
            const closeIcon = document.querySelector('.live-chat-close');
            openIcon.classList.toggle('d-none');
            closeIcon.classList.toggle('d-none');

            // Prevent body scroll when chat is open on mobile
            if (window.innerWidth < 768) {
                document.body.style.overflow = chatBox.classList.contains('show') ? 'hidden' : '';
            }
        });

        // Close chat box
        closeChatBox.addEventListener('click', function() {
            chatBox.classList.add('d-none');
            chatBox.classList.remove('show');

            // Reset icons
            document.querySelector('.live-chat-open').classList.remove('d-none');
            document.querySelector('.live-chat-close').classList.add('d-none');

            // Re-enable body scroll on mobile
            if (window.innerWidth < 768) {
                document.body.style.overflow = '';
            }
        });

        // Handle TWINT payment
        twintPaymentBtn.addEventListener('click', function() {
            if (!checkAuth()) return;

            // Show loading state
            twintPaymentBtn.disabled = true;
            twintPaymentBtn.querySelector('.indicator-label').style.display = 'none';
            twintPaymentBtn.querySelector('.indicator-progress').style.display = 'inline-block';

            // Get the live chat service
            fetch('{{ route('services.live-chat') }}')
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data) {
                        const service = data.data;
                        // Create payment intent
                        fetch('{{ route('service.payment.create') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content,
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({
                                    service_id: service.id,
                                    payment_method: 'twint'
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.redirectUrl) {
                                    window.location.href = data.redirectUrl;
                                } else {
                                    Swal.fire({
                                        title: 'Fehler',
                                        text: 'TWINT Zahlung konnte nicht initialisiert werden',
                                        icon: 'error',
                                        buttonsStyling: false,
                                        confirmButtonText: "Weiter!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        }
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: 'Fehler',
                                    text: 'Ein Fehler ist beim Bezahlvorgang aufgetreten',
                                    icon: 'error',
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });
                            })
                            .finally(() => {
                                // Reset button state
                                twintPaymentBtn.disabled = false;
                                twintPaymentBtn.querySelector('.indicator-label').style
                                    .display = 'inline-block';
                                twintPaymentBtn.querySelector('.indicator-progress').style
                                    .display = 'none';
                            });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Fehler',
                        text: 'Ein Fehler ist beim Bezahlvorgang aufgetreten',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: "Weiter!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                    // Reset button state
                    twintPaymentBtn.disabled = false;
                    twintPaymentBtn.querySelector('.indicator-label').style.display =
                        'inline-block';
                    twintPaymentBtn.querySelector('.indicator-progress').style.display = 'none';
                });
        });

        // Check if user is logged in
        function checkAuth() {
            @if (!auth()->check())
                window.location.href = '{{ route('login') }}';
                return false;
            @endif
            return true;
        }
    });
</script>
