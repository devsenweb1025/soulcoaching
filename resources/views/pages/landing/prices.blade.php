<x-landing-layout>
    @section('title', 'Preise – Faire & klare Preise für alle Angebote')
    @section('description', 'Hier findest du eine transparente Übersicht aller Preise – klar strukturiert, fair gestaltet und auf deine Bedürfnisse abgestimmt.')
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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Preise
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                Du möchtest mehr über die Preise für Transformationscoaching, energetisches Heilen, Tierkommunikation
                oder meine Hotline erfahren?<br /><br />
                Hier findest du transparente Preise für alle meine Dienstleistungen.
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
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest">{{ $service->title }}</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="text-start">
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
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="text-start">
                                                        <span class="fs-2x fw-bold text-primary">
                                                            Vorteile:
                                                        </span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    @if ($service->features)
                                                        @foreach ($service->features as $feature)
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </div>
                                                            <!--end::Item-->
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                @if ($service->hotline_active)
                                                    <a href="{{ route('services', ['scroll_to' => 'hotline']) }}"
                                                        class="btn btn-primary">Hotline anrufen</a>
                                                @else
                                                    <a href="https://calendly.com/seelen-fluesterin-info"
                                                       target="_blank"
                                                       class="btn btn-primary">
                                                        Termin buchen
                                                    </a>
                                                @endif
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
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
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest">{{ $service->title }}
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="text-start">
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
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="text-start">
                                                        <span class="fs-2x fw-bold text-primary">
                                                            Vorteile:
                                                        </span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    @if ($service->features)
                                                        @foreach ($service->features as $feature)
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                                <i
                                                                    class="ki-duotone ki-check-circle fs-1 text-success">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </div>
                                                            <!--end::Item-->
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                @if ($service->hotline_active)
                                                    <a href="{{ route('services', ['scroll_to' => 'hotline']) }}"
                                                        class="btn btn-primary">Hotline anrufen</a>
                                                @else
                                                    <a href="https://calendly.com/seelen-fluesterin-info"
                                                       target="_blank"
                                                       class="btn btn-primary">
                                                        Termin buchen
                                                    </a>
                                                @endif
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
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
