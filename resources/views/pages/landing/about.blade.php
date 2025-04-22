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
            <div class="d-flex flex-column flex-center text-center z-index-2">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-down-right" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                            <div class="card-body p-0 h-100">
                                <div class="row g-0 h-100">
                                    <!-- Image Column - Mobile: Full Width Fixed Height, Desktop: Half Width Full Height -->
                                    <div class="col-12 col-lg-6 h-50 h-lg-100">
                                        <div class="w-100 h-100">
                                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/person-right.jpg') }}"
                                                class="w-100 h-100 object-fit-cover rounded-start rounded-0 rounded-lg-start" alt="">
                                        </div>
                                    </div>
                                    <!-- Content Column - Mobile: Full Width, Desktop: Half Width -->
                                    <div class="col-12 col-lg-6 h-50 h-lg-100">
                                        <div class="p-10 h-100 d-flex flex-column justify-content-center">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                Seelenflüsterin Sarah
                                            </h1>
                                            <div data-aos="fade-up">
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    Ich bin Sarah – spiritueller Coach und Heilerin aus der Schweiz.
                                                </div>
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    Mein Weg ist geprägt von tiefem Wissen, persönlicher
                                                    Transformation
                                                    und der Verbindung zur feinstofflichen Welt.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-down-left" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card-body p-0 h-100">
                                <div class="row g-0 h-100">
                                    <!-- Image Column - Mobile: Full Width Fixed Height, Desktop: Half Width Full Height -->
                                    <div class="col-12 col-lg-6 h-50 h-lg-100">
                                        <div class="w-100 h-100">
                                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/sulana-high.webp') }}"
                                                class="w-100 h-100 object-fit-cover rounded-start rounded-0 rounded-lg-start" alt="">
                                        </div>
                                    </div>
                                    <!-- Content Column - Mobile: Full Width, Desktop: Half Width -->
                                    <div class="col-12 col-lg-6 h-50 h-lg-100">
                                        <div class="p-10 h-100 d-flex flex-column justify-content-center">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                Sulana
                                            </h1>
                                            <div data-aos="fade-up">
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    Seit über 16 Jahren ist Sulana meine treue Weggefährtin – und
                                                    eine
                                                    wundervolle Begleiterin.
                                                </div>
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    Paddington begleitet Sulana mit einer speziellen Energie aus der
                                                    Londoner Medialitätsschule.
                                                    Sulana hat mich viel gelehrt, und viele meiner Erkenntnisse
                                                    verdanke
                                                    ich ihr.
                                                </div>
                                            </div>
                                        </div>
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
                        <div class="card shadow w-100 h-100" data-aos="fade-up-right" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                            <div class="card-body p-10 h-100 d-flex flex-column justify-content-center">
                                <h1 class="fs-2 mb-5 font-cinzel">
                                    Meine Grundhaltung
                                </h1>
                                <div class="text-gray-600 fs-4 mb-5">
                                    Ehrlichkeit, Liebe und Mitgefühl sind die Säulen meiner Arbeit. Ich glaube
                                    an
                                    die Kraft der Verbindung – zwischen Menschen, Tieren und der geistigen Welt.
                                    «Wir sind alle verbunden – alles ist eins."
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-up-left" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                            <div class="card-body p-10 h-100 d-flex flex-column justify-content-center">
                                <h1 class="fs-2 mb-5 font-cinzel">
                                    Berufliche Ausbildung & Qualifikationen
                                </h1>
                                <div class="d-flex flex-column h-100 justify-content-center">
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Ausbildungen EFZ als Restaurationsfachfrau & Kauffrau
                                    </div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Dipl. Versicherungs- und Vorsorgeberaterin VBV
                                    </div>
                                    <div class="text-gray-600 fs-4 mb-5">
                                        Studium in Sozialpädagogik HF
                                    </div>
                                    <div class="text-gray-600 fs-4">
                                        Sprachen: DE, FR, EN und IT
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
    </div>

    <!--begin::About me-->
    <div class="d-flex w-100 px-9 z-index-1 position-relative">
        <div class="clouds-2"></div>
        <div class="w-100 container z-index-2">
            <!--begin::Heading-->
            <div class="d-flex flex-column flex-center text-center z-index-2">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel mt-10">Meine Aus- und</h1>
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Weiterbildungen</h1>
                <!--end::Title-->

                <!--begin::Row-->
                <div class="row w-100">
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Medialität
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
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Quantenheilung
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Quantenheilung & Spontanheilung
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Heiler Ausbildung
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Masterclass Geistiges Heilen & Energetisches Heilen
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Ausbildung kleiner Heiler
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Schamanismus und die 4 Elemente
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
                <div class="row w-100 mb-5">
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Tierkommunikation Tierenergetik
                                </h1>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Tierkommunikation 1.0 & 2.0
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-gray-800 fs-2">
                                        Tierenergetik
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
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
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
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
                                        Tarot
                                    </div>
                                </div>
                                <div class="mb-5"></div>
                                    <div class="text-gray-800 fs-2">
                                        Pendelkurs
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
                </div>
                <!--end::Row-->
            </div>
            <!--end::Heading-->
        </div>
    </div>
    <!--end::About me-->
</x-landing-layout>
