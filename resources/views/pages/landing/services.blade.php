<x-landing-layout>
    @section('title', 'Dienstleistungen – Übersicht & individuelle Angebote')
    @section('description', 'Individuelle Angebote für energetische, emotionale und körperliche Unterstützung –
        persönlich, abgestimmt und wirkungsvoll.')
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
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Dienstleistungen
                    <span
                        style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        {{-- <span id="kt_landing_hero_text"></span> --}}
                    </span>
                </h1>
                <div class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                    {!! App\Models\PageContent::where(['page' => 'services', 'section' => 'hero_description'])->first()->content ??
                        'Entdecke mein vielseitiges Angebot rund um spirituelles Coaching, energetisches Heilen, Tierkommunikation, Kartenlegen und meine spirituelle Hotline.' !!}
                </div>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Landing hero-->

        <!--begin::Plans-->
        <div class="d-flex flex-column position-relative mb-15">
            <div class="clouds-2"></div>
            <div class="container z-index-2">
                <!--begin::Pricing-->
                <div class="row g-5 z-index-2">
                    @foreach ($services as $service)
                        <div class="col-lg-3" id="card-container" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 bg-gray-300">
                                <div class="card-header">
                                    <h2 class="card-title fw-bold fs-md-7 fs-4">
                                        {{ $service['title'] }}
                                    </h2>
                                </div>
                                <div class="card-body pt-1">
                                    @if (!empty($service['features']))
                                        <div>
                                            <span class="fs-4 fw-bold text-primary">Vorteile:</span>
                                            <div class="mt-4">
                                                @foreach ($service['features'] as $feature)
                                                    <div class="d-flex flex-stack mb-2">
                                                        <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                        <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <a href="{{ route('prices', ['service' => $service['title']]) }}"
                                            class="btn btn-primary">
                                            zu den Preisen
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--end::Pricing-->
            </div>
        </div>
        <!--end::Plans-->
    </x-landing-layout>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('#card-container .card');
            let maxHeight = 0;

            // Set initial equal heights
            cards.forEach(card => {
                maxHeight = Math.max(maxHeight, card.offsetHeight);
            });

            cards.forEach(card => {
                card.style.height = `${maxHeight}px`;
            });
            // Auto-scroll to hotline section when hotline parameter is provided
            const urlParams = new URLSearchParams(window.location.search);
            const scrollToParam = urlParams.get('scroll_to');

            if (scrollToParam === 'hotline') {
                // Find the hotline section
                const hotlineSection = document.querySelector('.landing-light-bg.rounded');

                if (hotlineSection) {
                    setTimeout(() => {
                        hotlineSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 1000);
                }
            }
        });
    </script>
