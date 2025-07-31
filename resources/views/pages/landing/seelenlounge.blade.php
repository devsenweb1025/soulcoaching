<x-landing-layout>
    @section('title', 'Seelenlounge - Kostenloses Online-Treffen für spirituelle Themen')
    @section('description', 'Kostenlose Zoom-Meetings zu spirituellen und transformierenden Themen. Melde dich an,
        tausche dich mit Gleichgesinnten aus und finde Inspiration und neuen Halt.')

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
                    Seelenlounge -
                </h1>
                <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                    Kostenloses Online-Treffen für spirituelle Themen
                </p>
                <p class="fs-5 fs-md-6 fs-lg-7 font-archivo container text-gray-600">
                    Kostenlose Zoom-Meetings zu spirituellen und transformierenden Themen. Melde dich an, tausche dich mit
                    Gleichgesinnten aus und finde Inspiration und neuen Halt - besonders in Zeiten von Krisen oder
                    Umbrüchen.
                </p>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
        </div>

        <div class="position-relative z-index-1">
            <div class="clouds-1"></div>
            <!--begin::Main Content Section-->
            <div class="mt-sm-n20 position-relative mt-20 mb-20">
                <!--begin::Wrapper-->
                <div class="landing-light-bg position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Content-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col - Main Content (5/10)-->
                                <div class="col-xl-6 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="0">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-body pt-10">
                                            <h2 class="text-gray-900 mb-8 fw-boldest font-cinzel">Herzlich willkommen zu
                                                unseren wöchentlichen Donnerstags-Calls!</h2>

                                            <div class="mb-6">
                                                <p class="fs-6 text-gray-800 mb-4">
                                                    Jeden Donnerstag lade ich bis zu fünf Personen ein, um gemeinsam in
                                                    spannende Themen der Persönlichkeitsentwicklung, Spiritualität und
                                                    Kartenlegung einzutauchen.
                                                </p>

                                                <p class="fs-6 text-gray-800 mb-4">
                                                    Diese interaktiven Sessions bieten dir die Möglichkeit, dich
                                                    auszutauschen, neue Erkenntnisse zu gewinnen und deine persönliche Reise
                                                    zu bereichern.
                                                </p>

                                                <p class="fs-6 text-gray-800 mb-4">
                                                    Der Zugang zu diesen Calls erfolgt über den bereitgestellten Link.
                                                </p>

                                                <div class="alert alert-warning d-flex align-items-center p-5 mb-6">
                                                    <i class="ki-duotone ki-information-5 fs-2hx text-warning me-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <h5 class="mb-1 fw-bold text-warning">WICHTIG</h5>
                                                        <span class="fs-6 text-gray-800">
                                                            Bitte beachte, dass nur die ersten fünf Teilnehmer, die sich
                                                            anmelden, an dem Call teilnehmen können. Sei also schnell und
                                                            sichere dir deinen Platz!
                                                        </span>
                                                    </div>
                                                </div>

                                                <p class="fs-6 text-gray-800 mb-6">
                                                    Ich freue mich auf inspirierende Gespräche und Erkenntnisse mit dir!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col - Image (5/10)-->
                                <div class="col-xl-6 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="0">
                                    <div class="w-100 h-400px h-md-500px object-fit-cover rounded"
                                        style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/seelenlounge.webp') }}')">
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Main Content Section-->

            <!--begin::Events Section-->
            <div class="mt-sm-n20 position-relative mt-20 mb-20">
                <!--begin::Wrapper-->
                <div class="landing-light-bg position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Events-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="events">Themen für diesen Monat</h1>
                                <div class="text-gray-600 fw-semibold fs-5">Entdecke unsere kommenden spirituellen Sessions
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Events Grid-->
                            <div class="row g-10 justify-content-center">
                                <!--begin::Event 1-->
                                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="0">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-header ribbon ribbon-top ribbon-inner h-100">
                                            <h3 class="text-gray-900 mb-5 fw-boldest pt-10">Kartenlegung in Verbindung zur
                                                Seele</h3>
                                            <div class="ribbon-label bg-primary">Kartenlegung</div>
                                        </div>
                                        <div class="card-body pt-1 d-flex flex-column justify-content-between">
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="ki-duotone ki-calendar fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">7. August 2025</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <i class="ki-duotone ki-clock fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">20:00 Uhr - 22:00
                                                        Uhr</span>
                                                </div>
                                            </div>
                                            <a href="https://calendly.com/seelen-fluesterin-info/seelenlounge-kartenlegung"
                                                target="_blank" class="btn btn-primary w-100">
                                                Termin buchen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Event 1-->

                                <!--begin::Event 2-->
                                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="100">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-header ribbon ribbon-top ribbon-inner h-100">
                                            <h3 class="text-gray-900 mb-5 fw-boldest pt-10">Meditation zum Herzplaneten</h3>
                                            <div class="ribbon-label bg-success">Meditation</div>
                                        </div>
                                        <div class="card-body pt-1 d-flex flex-column justify-content-between">
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="ki-duotone ki-calendar fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">14. August 2025</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <i class="ki-duotone ki-clock fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">20:00 Uhr - 22:00
                                                        Uhr</span>
                                                </div>
                                            </div>
                                            <a href="https://calendly.com/seelen-fluesterin-info/seelenlounge-meditation"
                                                target="_blank" class="btn btn-primary w-100">
                                                Termin buchen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Event 2-->

                                <!--begin::Event 3-->
                                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="200">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-header ribbon ribbon-top ribbon-inner h-100">
                                            <h3 class="text-gray-900 mb-5 fw-boldest pt-10">Gefühle und ihre Wichtigkeit
                                            </h3>
                                            <div class="ribbon-label bg-info">Emotionen</div>
                                        </div>
                                        <div class="card-body pt-1 d-flex flex-column justify-content-between">
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="ki-duotone ki-calendar fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">24. August 2025</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <i class="ki-duotone ki-clock fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">20:00 Uhr - 22:00
                                                        Uhr</span>
                                                </div>
                                            </div>
                                            <a href="https://calendly.com/seelen-fluesterin-info/seelenlounge-gefuehle"
                                                target="_blank" class="btn btn-primary w-100">
                                                Termin buchen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Event 3-->

                                <!--begin::Event 4-->
                                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="300">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-header ribbon ribbon-top ribbon-inner h-100">
                                            <h3 class="text-gray-900 mb-5 fw-boldest pt-10">Transformation auf Energieebene
                                            </h3>
                                            <div class="ribbon-label bg-warning">Energie</div>
                                        </div>
                                        <div class="card-body pt-1 d-flex flex-column justify-content-between">
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="ki-duotone ki-calendar fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">28. August 2025</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <i class="ki-duotone ki-clock fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">20:00 Uhr - 22:00
                                                        Uhr</span>
                                                </div>
                                            </div>
                                            <a href="https://calendly.com/seelen-fluesterin-info/seelenlounge-transformation"
                                                target="_blank" class="btn btn-primary w-100">
                                                Termin buchen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Event 4-->
                            </div>
                            <!--end::Events Grid-->
                        </div>
                        <!--end::Events-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Events Section-->
        </div>

    </x-landing-layout>
