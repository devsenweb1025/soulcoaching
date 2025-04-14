<x-landing-layout>
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
                            <div class="row g-10 {{ $service->image_direction === 'right' ? 'flex-column-reverse flex-md-row' : 'flex-column flex-md-row' }}">
                                @if ($service->image_direction === 'right')
                                    <!--begin::Col-->
                                    <div class="col-xl-4 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest">{{ $service->title }}</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="text-start">
                                                        <span class="fs-2x fw-bold text-primary">
                                                            CHF {{ number_format($service->price, 2) }}.-
                                                            @if($service->benefit_option === 'month')
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
                                                    @if($service->features)
                                                        @foreach ($service->features as $feature)
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack mb-5">
                                                                <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
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
                                                @if ($service->service_option === 'booking')
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#bookingModal{{ $index }}">
                                                        Termin buchen
                                                    </button>
                                                @elseif ($service->service_option === 'payment')
                                                    <a href="{{ route('payment') }}?service={{ $service->slug }}"
                                                        class="btn btn-primary">Jetzt buchen</a>
                                                @elseif ($service->service_option === 'hotline' && $service->hotline_active)
                                                    <a href="tel:{{ config('app.hotline_number') }}"
                                                        class="btn btn-primary">Hotline anrufen</a>
                                                @endif
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="w-100 h-300px h-md-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ $service->image ? asset('storage/' . $service->image) : asset(theme()->getMediaUrlPath() . 'landing/prices/default.jpg') }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                @else
                                    <!--begin::Col-->
                                    <div class="col-xl-8 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="w-100 h-300px h-md-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ $service->image ? asset('storage/' . $service->image) : asset(theme()->getMediaUrlPath() . 'landing/prices/default.jpg') }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-4 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest">{{ $service->title }}</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="text-start">
                                                        <span class="fs-2x fw-bold text-primary">
                                                            CHF {{ number_format($service->price, 2) }}
                                                            @if($service->benefit_option === 'month')
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
                                                    @if($service->features)
                                                        @foreach ($service->features as $feature)
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack mb-5">
                                                                <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
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
                                                @if ($service->service_option === 'booking')
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#bookingModal{{ $index }}">
                                                        Termin buchen
                                                    </button>
                                                @elseif ($service->service_option === 'payment')
                                                    <a href="{{ route('payment') }}?service={{ $service->slug }}"
                                                        class="btn btn-primary">Jetzt buchen</a>
                                                @elseif ($service->service_option === 'hotline' && $service->hotline_active)
                                                    <a href="tel:{{ config('app.hotline_number') }}"
                                                        class="btn btn-primary">Hotline anrufen</a>
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

        @if ($service->service_option === 'booking')
            <!--begin::Modal-->
            <div class="modal fade" tabindex="-1" id="bookingModal{{ $index }}">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">{{ $service->title }}</h3>
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-5">
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="bookingType{{ $index }}" value="personal"
                                        checked>
                                    <span class="form-check-label">Einzelcoaching</span>
                                </label>
                            </div>
                            <div class="mb-5">
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="bookingType{{ $index }}" value="group">
                                    <span class="form-check-label">Gruppencoaching</span>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                            <button type="button" class="btn btn-primary"
                                onclick="handleBooking({{ $index }}, '{{ $service->slug }}')">Bestätigen</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal-->
        @endif
    @endforeach

    @push('scripts')
        <script>
            function handleBooking(index, serviceSlug) {
                const bookingType = document.querySelector(`input[name="bookingType${index}"]:checked`).value;
                if (bookingType === 'personal') {
                    window.location.href = "{{ route('booking') }}?service=" + serviceSlug + "&type=personal";
                } else {
                    window.location.href = "{{ route('booking') }}?service=" + serviceSlug + "&type=group";
                }
            }

            // Auto-scroll to specific service when service parameter is provided
            document.addEventListener('DOMContentLoaded', function () {
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
    @endpush

</x-landing-layout>