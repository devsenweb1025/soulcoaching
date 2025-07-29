<x-landing-layout>
    @section('title', 'Transformationscoaching – Faire & klare Preise für alle Angebote')
    @section('description',
        'Hier findest du eine transparente Übersicht aller Preise – klar strukturiert, fair
        gestaltet und auf deine Bedürfnisse abgestimmt.')
        @include('pages.landing._partials._background')
        <!--begin::Landing hero-->
        <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
            <div class="cloud">
                <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
                    data-framer-background-image-wrapper="true">
                    <img decoding="async" loading="lazy"
                        src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png" alt=""
                        style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
                </div>
            </div>
            <!--begin::Heading-->
            <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel d-inline-block align-middle">
                    Transformationscoaching
                    <span tabindex="0" class="ms-2 align-middle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-html="true"
                        data-bs-custom-class="custom-tooltip-style"
                        data-bs-title='
                        <div class="tooltip-content">
                            <strong class="tooltip-title">Fühlst du dich oft niedergeschlagen?</strong>
                            <div class="tooltip-subtitle">Mein Coaching löst Blockaden auf 5 Bewusstseinsebenen:</div>
                            <ul class="tooltip-list">
                                <li><b>Geistig:</b> Deinen Seelenweg erkennen und leben.</li>
                                <li><b>Mental:</b> Strategien zur Bewältigung negativer Gedanken.</li>
                                <li><b>Emotional:</b> Emotionen erkennen und annehmen.</li>
                                <li><b>Energetisch:</b> Energie durch Atem- und Bewegungsübungen aktivieren.</li>
                                <li><b>Körperlich:</b> Gesunde Gewohnheiten für mehr Vitalität.</li>
                            </ul>
                            <div class="tooltip-result">Das Ergebnis: Mehr Lebensfreude, innere Stärke und positive Veränderungen!</div>
                        </div>'
                        id="transformations-tooltip">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18" cy="18" r="18" fill="black" />
                            <text x="18" y="30" text-anchor="middle" font-size="36"
                                font-family="icomoon" fill="white" font-weight="bold">i</text>
                        </svg>
                    </span>
                </h1>
                <style>
                    .custom-tooltip-style.bs-tooltip-auto[data-popper-placement^=right],
                    .custom-tooltip-style.bs-tooltip-end {
                        background: #fff;
                        border: 1px solid var(--bs-primary, #12CE5D);
                        border-radius: 10px;
                        color: #222;
                        box-shadow: 0 4px 16px rgba(18, 206, 93, 0.10);
                        padding: 0;
                        max-width: 340px;
                    }
                    .custom-tooltip-style .tooltip-inner {
                        background: #fff;
                        color: #222;
                        border-radius: 10px;
                        padding: 0;
                        max-width: 340px;
                    }
                    .custom-tooltip-style .tooltip-content {
                        padding: 16px 18px 14px 18px;
                        font-size: 1.05rem;
                        line-height: 1.6;
                    }
                    .custom-tooltip-style .tooltip-title {
                        color: var(--bs-primary);
                        font-size: 1.1rem;
                        font-weight: 700;
                        margin-bottom: 6px;
                        display: block;
                    }
                    .custom-tooltip-style .tooltip-subtitle {
                        color: var(--bs-primary);
                        font-weight: 600;
                        margin-bottom: 8px;
                        font-size: 1rem;
                    }
                    .custom-tooltip-style .tooltip-list {
                        text-align: left !important;
                        margin: 0 0 10px 0;
                        padding-left: 1.2em;
                        font-size: 0.98rem;
                    }
                    .custom-tooltip-style .tooltip-list li {
                        margin-bottom: 3px;
                    }
                    .custom-tooltip-style .tooltip-result {
                        margin-top: 10px;
                        color: var(--bs-primary);
                        font-weight: 700;
                        font-size: 1rem;
                    }
                </style>
                <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                    Du möchtest mehr über die Preise für mein Transformationscoaching erfahren?<br /><br />
                    Hier findest du die verschiedenen Pakete zum Transformationscoaching - wähle was sich für dich gut
                    anfühlt. Du bist dir nicht sicher? Buche ein Kennenlerngespräch bei mir.
                </p>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
        </div>


        @foreach ($services as $index => $service)
            <!--begin::Pricing Section-->
            <div class="mt-sm-n20 position-relative mt-20 mb-20">
                <div class="clouds-{{ ($index % 4) + 1 }}"></div>
                <!--begin::Wrapper-->
                <div class="landing-light-bg position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 {{ $service->image_direction === 'right' ? 'text-start' : 'text-end' }}">
                                <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">{{ $service->title }}</h1>
                                <div class="text-gray-600 fw-semibold fs-5">{{ $service->description }}</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Pricing-->
                            <div class="text-start" id="kt_pricing">
                                <!--begin::Row-->
                                <div
                                    class="row g-10 {{ $service->image_direction === 'right' ? 'flex-column-reverse flex-md-row' : 'flex-column flex-md-row' }}">
                                    @if ($service->image_direction === 'right')
                                        <!--begin::Col-->
                                        <div class="col-xl-4 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                            data-aos-duration="500" data-aos-delay="0">
                                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                                <div class="card-header ribbon ribbon-top ribbon-inner">
                                                    <h1 class="text-gray-900 mb-5 fw-boldest pt-10" id="pricing">
                                                        {{ $service->title }}</h1>
                                                    @if (!empty($service->is_featured))
                                                        <div class="ribbon-label bg-danger">Meist gebucht</div>
                                                    @endif
                                                </div>
                                                <div class="card-body pt-1">
                                                    <div class="mb-4">
                                                        <span class="fs-2x fw-bold text-primary">
                                                            @chf($service->price).-
                                                            @if ($service->benefit_option === 'month')
                                                                / Monat
                                                            @elseif($service->benefit_option === 'hour')
                                                                / Stunde
                                                            @elseif($service->benefit_option === 'min')
                                                                / Minute
                                                            @elseif($service->benefit_option === 'per call')
                                                                / pro Gespräch
                                                            @elseif($service->benefit_option === 'one time')
                                                                <!-- nothing -->
                                                            @endif
                                                        </span>
                                                    </div>
                                                    @if (!empty($service->features))
                                                        <div>
                                                            <span class="fs-2x fw-bold text-primary">Vorteile:</span>
                                                            <div class="mt-4">
                                                                @foreach ($service->features as $feature)
                                                                    <div class="d-flex flex-stack mb-2">
                                                                        <span
                                                                            class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                                        <i
                                                                            class="ki-duotone ki-check-circle fs-1 text-success">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($service->hotline_active)
                                                        <a href="{{ route('services', ['scroll_to' => 'hotline']) }}"
                                                            class="btn btn-primary mt-4">Hotline anrufen</a>
                                                    @else
                                                        <a href="{{ $service->location }}" target="_blank"
                                                            class="btn btn-primary mt-4">
                                                            @if ($service->slug == 'exklusiv-bei-seelenfluesterin')
                                                                Ja, zur Kartenlegung
                                                            @else
                                                                Ja, zur Transformation
                                                            @endif
                                                        </a>
                                                        <a href="https://calendly.com/seelen-fluesterin-info/transformationscoaching-clone-2"
                                                            target="_blank" class="btn btn-primary mt-4">
                                                            Ja, erst kennenlernen
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-xl-8 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                            data-aos-duration="500" data-aos-delay="0">
                                            <div class="w-100 h-300px h-md-100 object-fit-cover"
                                                style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ $service->image ? asset('storage/' . $service->image) : asset(theme()->getMediaUrlPath() . 'landing/prices/default.jpg') }})">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    @else
                                        <!--begin::Col-->
                                        <div class="col-xl-8 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                            data-aos-duration="500" data-aos-delay="0">
                                            <div class="w-100 h-300px h-md-100 object-fit-cover"
                                                style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ $service->image ? asset('storage/' . $service->image) : asset(theme()->getMediaUrlPath() . 'landing/prices/default.jpg') }})">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-xl-4 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                            data-aos-duration="500" data-aos-delay="0">
                                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                                <div class="card-header ribbon ribbon-top ribbon-inner">
                                                    <h1 class="text-gray-900 pt-10 mb-5 fw-boldest">{{ $service->title }}
                                                    </h1>
                                                    @if (!empty($service->is_featured))
                                                        <div class="ribbon-label bg-danger">Meist gebucht</div>
                                                    @endif
                                                </div>
                                                <div class="card-body pt-1">
                                                    <div class="mb-4">
                                                        <span class="fs-2x fw-bold text-primary">
                                                            @chf($service->price).-
                                                            @if ($service->benefit_option === 'month')
                                                                / Monat
                                                            @elseif($service->benefit_option === 'hour')
                                                                / Stunde
                                                            @elseif($service->benefit_option === 'min')
                                                                / Minute
                                                            @elseif($service->benefit_option === 'per call')
                                                                / pro Gespräch
                                                            @elseif($service->benefit_option === 'one time')
                                                                <!-- nothing -->
                                                            @endif
                                                        </span>
                                                    </div>
                                                    @if (!empty($service->features))
                                                        <div>
                                                            <span class="fs-2x fw-bold text-primary">Vorteile:</span>
                                                            <div class="mt-4">
                                                                @foreach ($service->features as $feature)
                                                                    <div class="d-flex flex-stack mb-2">
                                                                        <span
                                                                            class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                                        <i
                                                                            class="ki-duotone ki-check-circle fs-1 text-success">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($service->hotline_active)
                                                        <a href="{{ route('services', ['scroll_to' => 'hotline']) }}"
                                                            class="btn btn-primary mt-4">Hotline anrufen</a>
                                                    @else
                                                        <a href="{{ $service->location }}" target="_blank"
                                                            class="btn btn-primary mt-4">
                                                            @if ($service->slug == 'exklusiv-bei-seelenfluesterin')
                                                                Ja, zur Kartenlegung
                                                            @else
                                                                Ja, zur Transformation
                                                            @endif
                                                        </a>
                                                        <a href="https://calendly.com/seelen-fluesterin-info/transformationscoaching-clone-2"
                                                            target="_blank" class="btn btn-primary mt-4">
                                                            Ja, erst kennenlernen
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    @endif
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Pricing-->
                        </div>
                        <!--end::Plans-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Pricing Section-->
        @endforeach


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

        // Check if user is logged in
        function checkAuth() {
            @if (!auth()->check())
                window.location.href = '{{ route('login') }}';
                return false;
            @endif
            return true;
        }

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
            if (!checkAuth()) return;

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
                        serviceId + '&paymentIntentId=' + data.paymentIntentId;
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
        });

        // Handle TWINT payment
        async function initiatePayment(paymentMethod, serviceId) {
            if (!checkAuth()) return;

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
                    // For TWINT, we'll show a QR code or redirect to TWINT app
                    if (data.redirectUrl) {
                        // Redirect to TWINT app
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

        // Handle booking
        function handleBooking(index, serviceSlug) {
            if (!checkAuth()) return;
            window.location.href = "{{ route('booking') }}?service=" + serviceSlug;
        }

        // Auto-scroll to specific service when service parameter is provided
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const serviceParam = urlParams.get('service');

            if (serviceParam) {
                // Find the service section with matching slug
                const serviceSections = document.querySelectorAll('.landing-light-bg');
                let targetSection = null;

                serviceSections.forEach(section => {
                    const titleElement = section.querySelector('h1.fs-2hx');
                    if (titleElement && titleElement.textContent.trim() === serviceParam) {
                        targetSection = section;
                    }
                });

                // Scroll to the target section if found
                if (targetSection) {
                    setTimeout(() => {
                        targetSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }, 1000);
                }
            }
        });
    </script>
