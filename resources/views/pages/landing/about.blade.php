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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Über mich
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">"Wer seine Schattenseiten nicht erfahren hat, wird sein Licht
                nicht erkennen." </p>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">Seelenflüsterin Sarah</p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <div class="d-flex w-100 px-9 z-index-1 position-relative">
        <div class="clouds-1"></div>
        <div class="w-100 container z-index-2">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                    <div class="card shadow h-100" data-aos="fade-down-right" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <div class="card-body h-100">
                            <div class="row h-100">
                                <div class="col-12 col-md-12 col-lg-6 h-md-50 h-lg-100 mb-5">
                                    <!--begin::Testimonial-->
                                    <div class="mb-2 w-100 h-100">
                                        <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/person-right.jpg') }}"
                                            class="w-100 h-100 object-fit-cover rounded" alt="">
                                    </div>
                                    <!--end::Testimonial-->
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <!--begin::Testimonial-->
                                    <div class="p-lg-10 p-md-5">
                                        <!--begin::Wrapper-->
                                        <div class="mb-2">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                Seelenflüsterin Sarah
                                            </h1>
                                            <div data-aos="fade-up">
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    Ich bin Sarah, spirituelle Beraterin, Medium und Heilerin. Mein Weg
                                                    ist geprägt von tiefem Wissen, Erfahrung und der Verbindung zur
                                                    feinstofflichen Welt. Ich arbeite nach dem Motto:
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Testimonial-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                    <div class="card shadow h-100" data-aos="fade-down-left" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <div class="card-body h-100">
                            <div class="row h-100">
                                <div class="col-12 col-md-12 col-lg-6 h-md-50 h-lg-100 mb-5">
                                    <!--begin::Testimonial-->
                                    <div class="mb-2 w-100 h-100">
                                        <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/sulana-high.webp') }}"
                                            class="w-100 h-100 object-fit-cover rounded" alt="">
                                    </div>
                                    <!--end::Testimonial-->
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 h-100">
                                    <!--begin::Testimonial-->
                                    <div class="p-lg-10 p-md-5">
                                        <!--begin::Wrapper-->
                                        <div class="mb-2">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                Sulana
                                            </h1>
                                            <div data-aos="fade-up">
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    Seit 16 Jahren ist Sulana meine Begleiterin.
                                                    Paddington Begleitet Sulana mit spezieller Energie aus der Londoner
                                                    Medialitätsschule.
                                                    Sulana hat mich sehr vieles gelehrt.
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Testimonial-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                    <div class="card shadow w-100 h-100" data-aos="fade-up-right" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <div class="card-body h-100">
                            <!--begin::Wrapper-->
                            <div class="">
                                <h1 class="fs-2 mb-5 font-cinzel">
                                    Meine Grundhaltung
                                </h1>
                                <div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Ehrlichkeit gehört zu meinen Grundprinzipien.
                                    </div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Liebe ist das wichtigste.
                                    </div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Wenn wir aufeinander eingehen und aufeinander
                                        achten, sind wir alle stark.
                                    </div>
                                    <div class="text-gray-600 fs-4">
                                        Wir sind alle verbunden - alles ist eins.
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                    <div class="card shadow w-100 h-100" data-aos="fade-up-left" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <div class="card-body">
                            <!--begin::Wrapper-->
                            <div class="">
                                <h1 class="fs-2 mb-5 font-cinzel">
                                    Berufliche Ausbildung & Qualifikationen
                                </h1>
                                <div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Ausbildung als Restaurationsfachfrau & Kauffrau
                                    </div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Studium in Sozialpädagogik HF
                                    </div>
                                    <div class="text-gray-600 fs-4">
                                        Sprachen: DE, FR, EN und IT
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 col-md-12 d-flex justify-content-center align-items-center mt-10">
                    <div class="card shadow-sm" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card-body">
                            <div class="row flex-column-reverse flex-sm-column-reverse flex-md-row flex-lg-row">
                                <div class="col-sm-12 col-md-6 col-lg-8 mt-5">
                                    <!--begin::Testimonial-->
                                    <div class="w-100 d-flex flex-column justify-content-between">
                                        <div class="mb-5">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                Berufliche Ausbildung & Qualifikationen
                                            </h1>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-gray-600 fs-4 mb-5">
                                                        Herzensmensch
                                                    </div>
                                                    <div class="text-gray-600 fs-4 mb-5">
                                                        Sympathisch
                                                    </div>
                                                    <div class="text-gray-600 fs-4 mb-5">
                                                        belesen
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-gray-600 fs-4 mb-5">
                                                        Harmonieliebend
                                                    </div>
                                                    <div class="text-gray-600 fs-4 mb-5">
                                                        vielseitig interessiert
                                                    </div>
                                                    <div class="text-gray-600 fs-4 mb-5">
                                                        wissbegierig
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-gray-600 fs-4">
                                            Ausbildung als Restaurationsfachfrau & Kauffrau
                                        </div>
                                    </div>
                                    <!--end::Testimonial-->
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <!--begin::Testimonial-->
                                    <div class="w-100 h-100">
                                        <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/person-left.jpg') }}"
                                            class="w-100 h-100 rounded" alt="">
                                    </div>
                                    <!--end::Testimonial-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
    </div>

    <!--begin::About me-->
    <div class="d-flex w-100 px-9 z-index-1 position-relative">
        <div class="clouds-2"></div>
        <div class="w-100 container z-index-2">
            <!--begin::Heading-->
            <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Meine Aus- und</h1>
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Weiterbildungen</h1>
                <!--end::Title-->

                <!--begin::Row-->
                <div class="row w-100">
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Mediumship
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Medialer Berater Kurs
                                    </div>
                                    <div class="text-gray-800 fs-4">
                                        (Pascal Voggenhuber)
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Medium-Weiterbildungen
                                    </div>
                                    <div class="text-gray-800 fs-4">
                                        (Arthur Findlay College, 2024 & 2025)
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Spiritueller Coach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Quantenphysik
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Quantenheilung & Spontanheilung
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Mitochondrien & TCM
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Heiler Ausbildung - Onaris
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Masterclass Geistiges Heilen &
                                        Energetisches Heilen
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Ausbildung kleiner Heiler
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Schamanismus und 4 Elemente
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Heilen mit Symbolen und Zeichen
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Reinigungen (Körper, Geist, Räumen)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row w-100">
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Tierkommunikation Tierenergetik
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Tierkommunikation 1.0 & 2.0
                                    </div>
                                    <div class="text-gray-800 fs-4">
                                        (M. Lenk, 2024)
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Tierenergetik
                                    </div>
                                    <div class="text-gray-800 fs-4">
                                        (Holfinity Academy)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Chakren, Reiki & Channeling
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Chakren Harmonisierung
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Reiki 1. Grad
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Channeling
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Sonstiges
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Kartenlegen
                                    </div>
                                    <div class="text-gray-800 fs-4">
                                        (Leonormand)
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Pendelkurs
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Heading-->
        </div>
    </div>
    <!--end::About me-->

    <!--begin::Partners Section-->
    <div class="position-relative z-index-2">
        <div class="clouds-3"></div>
        <div class="mt-20 z-index-1 container z-index-2">
            <!--begin::Curve top-->
            <div class="landing-curve landing-light-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <div class="py-20 landing-light-bg rounded position-relative z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Plans-->
                    <div class="d-flex flex-column container">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bold mb-5 font-cinzel">Medien & Zusammenarbeiten</h1>
                            <div class="text-gray-600 fw-semibold fs-5">
                                Ich war schon in diversen Medien dabei und hatte schon diverse zusammenarbeiten.<br />
                                Vielleicht hast du schonmal von mir gehört?
                            </div>
                        </div>
                        <!--end::Heading-->

                        <!--begin::Partner Carousel-->
                        <div class="tns tns-default" style="direction: ltr" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-duration="500" data-aos-delay="0">
                            <!--begin::Slider-->
                            <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false"
                                data-tns-speed="1000" data-tns-autoplay="true" data-tns-autoplay-timeout="5000"
                                data-tns-controls="true" data-tns-nav="false" data-tns-items="1"
                                data-tns-center="false" data-tns-dots="false" data-tns-slide-by="1"
                                data-tns-responsive="{768:{items:2},992:{items:3},1200:{items:4}}"
                                data-tns-prev-button="#kt_partner_slider_prev"
                                data-tns-next-button="#kt_partner_slider_next">
                                @for ($i = 1; $i <= 5; $i++)
                                    <!--begin::Item-->
                                    <div class="px-5 py-5">
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="height: 100px;">
                                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/partners/partner' . $i . '.png') }}"
                                                alt="Partner {{ $i }}" class="img-fluid"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                @endfor
                            </div>
                            <!--end::Slider-->

                            <!--begin::Slider button-->
                            <button class="btn btn-icon btn-active-color-primary" id="kt_partner_slider_prev">
                                <span class="svg-icon fs-3x">
                                    {!! theme()->getIcon('arrow-left', 'fs-1 text-gray-800') !!}
                                </span>
                            </button>
                            <!--end::Slider button-->

                            <!--begin::Slider button-->
                            <button class="btn btn-icon btn-active-color-primary" id="kt_partner_slider_next">
                                <span class="svg-icon fs-3x">
                                    {!! theme()->getIcon('arrow-right', 'fs-1 text-gray-800') !!}
                                </span>
                            </button>
                            <!--end::Slider button-->
                        </div>
                        <!--end::Partner Carousel-->

                        <!--begin::Partner Cards-->
                        <div class="row mt-15">
                            @php
                                $partners = [
                                    1 => [
                                        'name' => 'Bericht',
                                        'description' =>
                                            'FTMedien ist ein regionaler Medienpartner mit Fokus auf lokale Sichtbarkeit und wirkungsvolle Werbung. Durch die Verbindung von Print und digitalen Kanälen bietet FTMedien vielfältige Möglichkeiten, um Zielgruppen gezielt und professionell anzusprechen.',
                                        'domain' => 'https://www.ftmedien.ch/',
                                    ],
                                    2 => [
                                        'name' => 'Bericht',
                                        'description' =>
                                            'Auf gesund.ch findest du alles rund um einen bewussten Lebensstil. Die Plattform bringt Themen wie Gesundheit, Achtsamkeit und ganzheitliches Wohlbefinden auf den Punkt – verständlich, inspirierend und lebensnah. Für uns ist gesund.ch ein wertvoller Ort, um Menschen genau dort zu erreichen, wo Interesse für Gesundheit auf echtes Wissen trifft.',
                                        'domain' => 'https://www.gesund.ch/',
                                    ],
                                    3 => [
                                        'name' => 'Bericht',
                                        'description' =>
                                            'Mit Berk verbindet uns eine echte Partnerschaft. Ihre Produkte – von Räucherwaren bis hin zu spirituellen Begleitern – schaffen Raum für Achtsamkeit, innere Ruhe und bewusstes Leben. Wir schätzen die Zusammenarbeit mit Berk sehr, denn hier geht es nicht nur um Produkte, sondern um Haltung, Qualität und eine gemeinsame Vision.',
                                        'domain' => 'https://partner3.com',
                                    ],
                                    4 => [
                                        'name' => 'Bericht',
                                        'description' =>
                                            'AuraSomaShop bringt Farbe ins Leben – im wahrsten Sinne des Wortes. Die Philosophie hinter Aura-Soma passt perfekt zu unserem Verständnis von Balance und Selbstfürsorge. Als Partner unterstützt uns AuraSomaShop mit hochwertigen Produkten, die helfen, die eigene Mitte zu stärken und sich selbst besser kennenzulernen.',
                                        'domain' => 'https://www.aurasomashop.ch/',
                                    ],
                                    5 => [
                                        'name' => 'Bericht',
                                        'description' =>
                                            'Aqua Schweiz ist ein Unternehmen mit Sitz in Würenlos, das sich auf die Aufbereitung und den Vertrieb von levitiertem Wasser spezialisiert hat. Ihr levitiertes Wasser wird an einem besonderen Kraftort abgefüllt, der Energiewerte von über 100’000 Boviseinheiten aufweist. Diese hohe Energie soll sich positiv auf die Qualität des Wassers auswirken. Zusätzlich bietet Aqua Schweiz Himalaya-Kristallsalzprodukte an, die das Wohlbefinden fördern. Die Zusammenarbeit mit Aqua Schweiz ermöglicht es uns, unseren Kunden hochwertige Produkte für Gesundheit und Wohlbefinden anzubieten.',
                                        'domain' => 'https://aquaschweiz.ch/',
                                    ],
                                ];
                            @endphp

                            @foreach ($partners as $id => $partner)
                                <div class="col-lg-12 mt-10" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="500">
                                    <div class="card shadow h-100">
                                        <div class="card-body">
                                            <div class="text-center mb-10">
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="height: 80px;">
                                                    <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/partners/partner' . $id . '.png') }}"
                                                        alt="{{ $partner['name'] }}" class="img-fluid"
                                                        style="max-height: 80px; width: auto;">
                                                </div>
                                            </div>
                                            <div class="text-gray-600 fs-4 mb-10">
                                                {{ $partner['description'] }}
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ $partner['domain'] }}"
                                                    class="text-primary text-hover-primary fs-5 fw-bold"
                                                    target="_blank">
                                                    {{ $partner['domain'] }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Partner Cards-->
                    </div>
                    <!--end::Plans-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            <div class="landing-curve landing-light-color">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>
    </div>
    <!--end::Partners Section-->
</x-landing-layout>
