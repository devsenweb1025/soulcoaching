<!--begin::Live Chat Section-->
<div class="position-fixed bottom-0 end-0 z-index-3">
    <!-- Live Chat Box -->
    <div id="liveChatBox" class="card shadow-lg mb-5 me-5 d-none" style="width: 400px;">
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
                        @auth
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
                        @else
                            <!-- Single buy button for guests -->
                            <button type="button" class="btn btn-primary w-100" onclick="handleLiveChatPurchase()">
                                <i class="ki-duotone ki-purchase fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Jetzt kaufen
                            </button>
                        @endauth
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

<!-- Guest Purchase Modal -->
<div class="modal fade" id="guestLiveChatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Als Gast kaufen</h2>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body">
                <form id="guestLiveChatForm">
                    <div class="mb-5">
                        <label class="form-label required">Email Adresse</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    <div class="mb-5">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" id="liveChatTermsCheckbox" required />
                            <label class="form-check-label" for="liveChatTermsCheckbox">
                                Ich verstehe, dass ich bei Weitergabe des Inhalts an andere mit einer Geldstrafe rechnen muss
                            </label>
                        </div>
                    </div>
                    <div class="text-start payment-buttons" style="display: none;">
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary" onclick="showLiveChatStripeForm()">
                                <i class="ki-duotone ki-credit-cart fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Mit Karte bezahlen
                            </button>
                            <button type="button" class="btn btn-primary" onclick="initiateLiveChatPayment('twint')" id="liveChatTwintButton">
                                <i class="ki-duotone ki-wallet fs-2 me-2">
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
                </form>
                <!-- Stripe Form for Guest -->
                <div id="liveChatStripeForm" class="mt-4 w-100" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Zahlungsdaten angeben</h5>
                            <form id="liveChatPaymentForm">
                                <div class="mb-3">
                                    <label for="liveChatCardElement" class="form-label">Kredit- oder Debitkarte</label>
                                    <div id="liveChatCardElement" class="form-control">
                                        <!-- Stripe Card Element will be inserted here -->
                                    </div>
                                    <div id="liveChatCardErrors" class="text-danger mt-2" role="alert"></div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary" id="liveChatSubmitButton">
                                        <span class="indicator-label">Jetzt bezahlen</span>
                                        <span class="indicator-progress" style="display: none;">
                                            Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-light" onclick="hideLiveChatStripeForm()">Abbrechen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        if (typeof window.liveChatStripe === 'undefined') {
            window.liveChatStripe = Stripe('{{ config('services.stripe.key') }}', {
                locale: 'de'
            });
            window.liveChatElements = window.liveChatStripe.elements();
            window.liveChatCard = null;
        }

        // Initialize card element
        function initializeLiveChatCard() {
            if (!window.liveChatCard) {
                window.liveChatCard = window.liveChatElements.create('card', {
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
            return window.liveChatCard;
        }

        // Show Stripe form
        showStripeFormBtn?.addEventListener('click', function() {
            if (!checkAuth()) return;
            stripeForm.style.display = 'block';
            initializeLiveChatCard();
            window.liveChatCard.mount('#cardElement');
        });

        // Hide Stripe form
        cancelStripeForm?.addEventListener('click', function() {
            stripeForm.style.display = 'none';
            if (window.liveChatCard) {
                window.liveChatCard.unmount();
            }
        });

        // Handle form submission
        paymentForm?.addEventListener('submit', async function(e) {
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

                    const { error } = await window.liveChatStripe.confirmCardPayment(paymentData.clientSecret, {
                        payment_method: {
                            card: window.liveChatCard,
                            billing_details: {
                                name: '{{ isset(auth()->user()->name) ? auth()->user()->name : '' }}',
                                email: '{{ isset(auth()->user()->email) ? auth()->user()->email : '' }}'
                            }
                        }
                    });

                    if (error) {
                        throw new Error(error.message);
                    }

                    window.location.href = '{{ route('service.payment.success') }}?payment_method=stripe&service_id=' +
                        service.id + '&paymentIntentId=' + paymentData.paymentIntentId;
                }
            } catch (error) {
                Swal.fire({
                    text: error.message || 'An error occurred while processing your payment',
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
        twintPaymentBtn?.addEventListener('click', function() {
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
                                twintPaymentBtn.querySelector('.indicator-label').style.display = 'inline-block';
                                twintPaymentBtn.querySelector('.indicator-progress').style.display = 'none';
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
                    twintPaymentBtn.querySelector('.indicator-label').style.display = 'inline-block';
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

        // Guest purchase handling
        window.handleLiveChatPurchase = function() {
            const modal = new bootstrap.Modal(document.getElementById('guestLiveChatModal'));
            modal.show();
        };

        // Show Stripe form for guest
        window.showLiveChatStripeForm = function() {
            const form = document.getElementById('liveChatStripeForm');
            if (form) {
                form.style.display = 'block';
                const cardElement = initializeLiveChatCard();
                cardElement.mount('#liveChatCardElement');
            }
        };

        // Hide Stripe form for guest
        window.hideLiveChatStripeForm = function() {
            const form = document.getElementById('liveChatStripeForm');
            if (form) {
                form.style.display = 'none';
                if (window.liveChatCard) {
                    window.liveChatCard.unmount();
                }
            }
        };

        // Handle guest form submission
        document.getElementById('guestLiveChatForm')?.addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = this.querySelector('[name="email"]').value;
            const termsAccepted = this.querySelector('#liveChatTermsCheckbox').checked;

            if (!termsAccepted) {
                Swal.fire({
                    text: 'Bitte akzeptieren Sie die Bedingungen',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Weiter!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
                return;
            }

            // Store guest email in session
            try {
                const response = await fetch('/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email
                    })
                });

                if (!response.ok) {
                    throw new Error('Failed to store email');
                }

                // Show payment options
                const paymentButtons = document.querySelector('#guestLiveChatForm .payment-buttons');
                if (paymentButtons) {
                    paymentButtons.style.display = 'block';
                }
            } catch (error) {
                Swal.fire({
                    text: error.message || 'Ein Fehler ist aufgetreten',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Weiter!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            }
        });

        // Handle guest payment form submission
        document.getElementById('liveChatPaymentForm')?.addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitButton = document.getElementById('liveChatSubmitButton');
            const email = document.querySelector('#guestLiveChatForm [name="email"]').value;

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
                            payment_method: 'stripe',
                            email: email
                        })
                    });

                    const paymentData = await paymentResponse.json();

                    if (paymentData.error) {
                        throw new Error(paymentData.error);
                    }

                    const { error } = await window.liveChatStripe.confirmCardPayment(paymentData.clientSecret, {
                        payment_method: {
                            card: window.liveChatCard,
                            billing_details: {
                                email: email
                            }
                        }
                    });

                    if (error) {
                        throw new Error(error.message);
                    }

                    window.location.href = '{{ route('service.payment.success') }}?payment_method=stripe&service_id=' +
                        service.id + '&paymentIntentId=' + paymentData.paymentIntentId;
                }
            } catch (error) {
                Swal.fire({
                    text: error.message || 'An error occurred while processing your payment',
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

        // Handle TWINT payment for guest
        window.initiateLiveChatPayment = async function(paymentMethod) {
            const twintButton = document.getElementById('liveChatTwintButton');
            const email = document.querySelector('#guestLiveChatForm [name="email"]').value;

            if (twintButton) {
                twintButton.disabled = true;
                twintButton.querySelector('.indicator-label').style.display = 'none';
                twintButton.querySelector('.indicator-progress').style.display = 'inline-block';
            }

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
                            payment_method: paymentMethod,
                            email: email
                        })
                    });

                    const paymentData = await paymentResponse.json();

                    if (paymentData.error) {
                        throw new Error(paymentData.error);
                    }

                    if (paymentData.redirectUrl) {
                        window.location.href = paymentData.redirectUrl;
                    }
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
        };

        // Add checkbox change event listener
        document.getElementById('liveChatTermsCheckbox')?.addEventListener('change', function() {
            const paymentButtons = document.querySelector('#guestLiveChatForm .payment-buttons');
            if (paymentButtons) {
                paymentButtons.style.display = this.checked ? 'block' : 'none';
            }
        });
    });
</script>
