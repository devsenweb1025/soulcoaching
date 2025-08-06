<x-landing-layout>
    @section('title', 'Online-Kurse für energetisches Heilen & Selbstentwicklung – Seelenfluesterin')
    @section('description', 'Vertiefe dein Wissen mit Kursen zu Chakren, Heilung & Selbstentwicklung – online & flexibel in deinem Tempo verfügbar.')
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
            <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Online Kurs - Seelenacademy
                    <span
                        style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        {{-- <span id="kt_landing_hero_text"></span> --}}
                    </span>
                </h1>
                <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                    In der Seelenacademy lernst du, wie du deine Selbstheilungskräfte aktivieren kannst, um emotionale und
                    körperliche Blockaden zu lösen und deine Lebensenergie zu steigern.<br /><br />
                    Meine Online-Kurse verbinden energetisches Heilen, spirituelles Coaching und ganzheitliches Wissen über
                    Chakra-Harmonisierung, Transformation und Bewusstseinsentwicklung.<br /><br />
                    Du erfährst, was es bedeutet, ein energetisches Wesen zu sein, und wie du dich selbst stärken, heilen
                    und innerlich wachsen kannst – bequem von überall in der Schweiz, Österreich oder Deutschland.
                </p>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Landing hero-->
        <div class="position-relative">
            <div class="clouds-1"></div>
            <!--begin::Pricing Section-->
            <div class="mt-sm-n20 position-relative pt-20 pb-20 landing-light-bg">
                <!--begin::Wrapper-->
                <div class="position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-start">
                                <h1 class="fs-2hx fw-bold mb-5 text-center font-cinzel text-primary" id="pricing"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Schmerzen & Chakra Kurs</h1>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Pricing-->
                            <div class="text-start" id="kt_pricing">
                                <!--begin::Row-->
                                <div class="row g-10 flex-column-reverse flex-md-row">
                                    <!--begin::Col-->
                                    <div class="col-xl-5 col-md-6" data-aos="flip-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Dieser Kurs ist für dich
                                                        wenn...
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="d-flex flex-column">
                                                        @php
                                                            $chakraItems = [
                                                                'Du dein Wissen über die Chakren erweitern möchtest',
                                                                'Du wissen willst, welche Chakren mit welchen körperlichen oder emotionalen Beschwerden verbunden sind',
                                                                'Du lernen willst, wie du deine Chakren reinigen und Chakren stärken kannst',
                                                                'Du dich müde, energielos oder innerlich blockiert fühlst, aber keine medizinische Ursache bekannt ist',
                                                                'Du deine Selbstheilungskräfte aktivieren und mehr Energie & Lebensfreude spüren möchtest',
                                                                'Du dich für den Kurs energetisches Heilen vorbereiten willst',
                                                                'Du die Ursachen für energetische Blockaden verstehen willst',
                                                            ];
                                                        @endphp

                                                        @foreach ($chakraItems as $item)
                                                            <li class="d-flex align-items-center py-2 fs-5 text-gray-600">
                                                                <span class="bullet me-5 fs-3"></span> {{ $item }}
                                                            </li>
                                                        @endforeach
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Energieaustausch:
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="d-flex flex-column">
                                                        <li class="d-flex align-items-center py-2 fs-5 text-gray-600">
                                                            <span class="bullet me-5 fs-3"></span> Schmerzen & Chakra Kurs:
                                                            CHF
                                                            444.-
                                                        </li>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Heading-->
                                                <div class="text-start">
                                                    <div class="d-flex gap-2">
                                                        @auth
                                                            <!-- Direct payment options for logged-in users -->
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="showStripeForm(1, 1)">
                                                                <i class="ki-duotone ki-credit-cart fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                Mit Karte bezahlen
                                                            </button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="initiatePayment('twint', 1)" id="twint-button-1">
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
                                                        @else
                                                            <!-- Single buy button for guests -->
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="handlePurchase(1)">
                                                                <i class="ki-duotone ki-purchase fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                Jetzt kaufen
                                                            </button>
                                                        @endauth
                                                    </div>
                                                    @auth
                                                        <!-- Stripe Form for Course 1 -->
                                                        <div id="stripe-form-1" class="mt-4 w-100" style="display: none;">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title mb-4">Zahlungsdaten angeben</h5>
                                                                    <form id="payment-form-1">
                                                                        <div class="mb-3">
                                                                            <label for="card-element-1"
                                                                                class="form-label">Kredit-
                                                                                oder Debitkarte</label>
                                                                            <div id="card-element-1" class="form-control">
                                                                                <!-- Stripe Card Element will be inserted here -->
                                                                            </div>
                                                                            <div id="card-errors-1" class="text-danger mt-2"
                                                                                role="alert"></div>
                                                                        </div>
                                                                        <div class="d-flex gap-2">
                                                                            <button type="submit" class="btn btn-primary"
                                                                                id="submit-button-1">
                                                                                <span class="indicator-label">Jetzt
                                                                                    bezahlen</span>
                                                                                <span class="indicator-progress"
                                                                                    style="display: none;">
                                                                                    Bitte warten... <span
                                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button type="button" class="btn btn-light"
                                                                                onclick="hideStripeForm(1)">Abbrechen</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endauth
                                                </div>
                                                <!--end::Heading-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-7 col-md-6" data-aos="flip-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="w-100 h-300px h-md-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses/chakra-kurs-schmerzen-heilung-herzchakra-seelenfluesterin.webp') }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
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

            <!--begin::Pricing Section-->
            <div class="mt-sm-n20 position-relative pt-20 pb-20">
                <!--begin::Wrapper-->
                <div class="position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-start">
                                <h1 class="fs-2hx fw-bold mb-5 text-center font-cinzel text-primary" id="pricing"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Kompletter Kurs Energetisches Heilen
                                </h1>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Pricing-->
                            <div class="text-start" id="kt_pricing">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-12" data-aos="fade-up" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="text-start mb-5">
                                                    <!--begin::Title-->
                                                    <div class="mb-5 fw-boldest fs-5 text-gray-600">
                                                        Energetisches Heilen ist mehr als Handauflegen – es ist eine innere
                                                        Haltung, ein Weg zur Aktivierung der Selbstheilungskräfte. In diesem
                                                        Kurs lernst du die Grundlagen der Energiearbeit, erfährst, wie du
                                                        energetische Blockaden lösen und deine Lebensenergie ins
                                                        Gleichgewicht
                                                        bringen kannst. Du erhältst nicht nur theoretisches Wissen, sondern
                                                        auch
                                                        praktische Übungen für den Alltag. Der Kurs ist ideal für alle, die
                                                        sich
                                                        für holistische Heilmethoden, Chakra-Heilung und spirituelles Heilen
                                                        interessieren. Bitte beachte: Der Chakra Kurs bildet die empfohlene
                                                        Grundlage für diesen Kurs.
                                                    </div>
                                                    <!--end::Title-->

                                                    <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Energieaustausch:
                                                    </h1>

                                                    <div class="fw-boldest fs-5 text-gray-600">
                                                        Kompletter Energetischer Heilkurs CHF 999.-
                                                    </div>
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Heading-->
                                                <div class="text-start">
                                                    <div class="d-flex gap-2">
                                                        @auth
                                                            <!-- Direct payment options for logged-in users -->
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="showStripeForm(2, 2)">
                                                                <i class="ki-duotone ki-credit-cart fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                Mit Karte bezahlen
                                                            </button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="initiatePayment('twint', 2)" id="twint-button-2">
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
                                                        @else
                                                            <!-- Single buy button for guests -->
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="handlePurchase(2)">
                                                                <i class="ki-duotone ki-purchase fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                Jetzt kaufen
                                                            </button>
                                                        @endauth
                                                    </div>
                                                    <!-- Stripe Forms for Registered Users -->
                                                    @auth


                                                        <!-- Stripe Form for Course 2 -->
                                                        <div id="stripe-form-2" class="mt-4 w-100" style="display: none;">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title mb-4">Zahlungsdaten angeben</h5>
                                                                    <form id="payment-form-2">
                                                                        <div class="mb-3">
                                                                            <label for="card-element-2"
                                                                                class="form-label">Kredit-
                                                                                oder Debitkarte</label>
                                                                            <div id="card-element-2" class="form-control">
                                                                                <!-- Stripe Card Element will be inserted here -->
                                                                            </div>
                                                                            <div id="card-errors-2" class="text-danger mt-2"
                                                                                role="alert"></div>
                                                                        </div>
                                                                        <div class="d-flex gap-2">
                                                                            <button type="submit" class="btn btn-primary"
                                                                                id="submit-button-2">
                                                                                <span class="indicator-label">Jetzt
                                                                                    bezahlen</span>
                                                                                <span class="indicator-progress"
                                                                                    style="display: none;">
                                                                                    Bitte warten... <span
                                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button type="button" class="btn btn-light"
                                                                                onclick="hideStripeForm(2)">Abbrechen</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endauth
                                                </div>
                                                <!--end::Heading-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
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


            <!--begin::Pricing Section-->
            <div class="mt-sm-n20 position-relative pt-20 pb-20 landing-light-bg">
                <!--begin::Wrapper-->
                <div class="position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-start">
                                <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Energetisches Heilen - Theorie</h1>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Pricing-->
                            <div class="text-start" id="kt_pricing">
                                <!--begin::Row-->
                                <div class="row g-10 flex-column-reverse flex-md-row">
                                    <!--begin::Col-->
                                    <div class="col-xl-5 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Dieser Kurs ist für dich
                                                        wenn...
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="d-flex flex-column">
                                                        @php
                                                            $theorieItems = [
                                                                'Du dein Wissen über energetisches Heilen erweitern möchtest',
                                                                'Du verstehen willst, wie Energiearbeit bei körperlichen und emotionalen Blockaden helfen kann',
                                                                'Du nach Lösungen für deine Selbstheilung im Alltag suchst',
                                                                'Du deinen Liebsten durch spirituelle Heilmethoden helfen willst',
                                                                'Du deinen Herzensweg mit mehr Energie und Klarheit gehen willst',
                                                                'Du deine Schwingung erhöhen und dein inneres Gleichgewicht stärken möchtest',
                                                                'Du deiner Seelenaufgabe näherkommen und dich persönlich weiterentwickeln willst',
                                                                'Du deine Selbstheilungskräfte aktivieren und bewusst leben möchtest',
                                                            ];
                                                        @endphp

                                                        @foreach ($theorieItems as $item)
                                                            <li class="d-flex align-items-center py-2 fs-5 text-gray-600">
                                                                <span class="bullet me-5 fs-3"></span> {{ $item }}
                                                            </li>
                                                        @endforeach
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-7 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="w-100 h-300px h-md-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses/energetisches-heilen-theorie-kurs-lernen-seelenfluesterin.webp') }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
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

            <!--begin::Pricing Section-->
            <div class="position-relative pt-20 pb-20">
                <!--begin::Wrapper-->
                <div class="position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-start">
                                <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Energetisches Heilen - Praxis</h1>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Pricing-->
                            <div class="text-start" id="kt_pricing">
                                <!--begin::Row-->
                                <div class="row g-10 flex-column flex-md-row">
                                    <!--begin::Col-->
                                    <div class="col-xl-7 col-md-6" data-aos="zoom-in-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="w-100 h-300px h-md-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses/energetisches-heilen-praxis-anwendung-seelenarbeit-seelenfluesterin.webp') }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-5 col-md-6" data-aos="zoom-in-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="0">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Dieser Kurs ist für dich
                                                        wenn...
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="d-flex flex-column">
                                                        @php
                                                            $praxisItems = [
                                                                'Dein Wissen über energetisches Heilen vertiefen und gezielt anwenden möchtest',
                                                                'Verstehen willst, wie Energiearbeit auf Körper, Geist & Seele wirkt',
                                                                'Im Alltag Blockaden lösen und mehr innere Balance spüren möchtest',
                                                                'Deine Liebsten mit Energiearbeit unterstützen willst – liebevoll und intuitiv kannst',
                                                                'Deinem Herzenstier bei emotionalen oder körperlichen Beschwerden helfen möchtest',
                                                                'Lernen willst, wie man die Chakren reinigt und stärkt',
                                                                'Den Ruf deiner Seelenaufgabe besser verstehen und ihr folgen möchtest',
                                                                'Deine Selbstheilungskräfte aktivieren willst, um ganz in deine Kraft zu kommen',
                                                            ];
                                                        @endphp

                                                        @foreach ($praxisItems as $item)
                                                            <li class="d-flex align-items-center py-2 fs-5 text-gray-600">
                                                                <span class="bullet me-5 fs-3"></span> {{ $item }}
                                                            </li>
                                                        @endforeach
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
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
        </div>

        <!-- Guest Purchase Form Modal -->
        <div class="modal fade" id="guestPurchaseModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Als Gast kaufen</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="guestPurchaseForm">
                            <div class="mb-5">
                                <label class="form-label required">Email Adresse</label>
                                <input type="email" class="form-control" name="email" required />
                            </div>
                            <div class="mb-5">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="termsCheckbox" required />
                                    <label class="form-check-label" for="termsCheckbox">
                                        Ich verstehe, dass ich bei Weitergabe des Inhalts an andere mit einer Geldstrafe
                                        rechnen muss
                                    </label>
                                </div>
                            </div>
                            <div class="text-start payment-buttons" style="display: none;">
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-primary"
                                        onclick="showStripeForm(currentCourseId, currentCourseId)">
                                        <i class="ki-duotone ki-credit-cart fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Mit Karte bezahlen
                                    </button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="initiatePayment('twint', currentCourseId)" id="twint-button-guest">
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
                            </div>
                        </form>
                        <!-- Stripe Form for Guest -->
                        <div id="stripe-form-guest" class="mt-4 w-100" style="display: none;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Zahlungsdaten angeben</h5>
                                    <form id="payment-form-guest">
                                        <div class="mb-3">
                                            <label for="card-element-guest" class="form-label">Kredit- oder
                                                Debitkarte</label>
                                            <div id="card-element-guest" class="form-control">
                                                <!-- Stripe Card Element will be inserted here -->
                                            </div>
                                            <div id="card-errors-guest" class="text-danger mt-2" role="alert"></div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary" id="submit-button-guest">
                                                <span class="indicator-label">Jetzt bezahlen</span>
                                                <span class="indicator-progress" style="display: none;">
                                                    Bitte warten... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-light"
                                                onclick="hideStripeForm('guest')">Abbrechen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Purchase Options Modal -->
        <div class="modal fade" id="purchaseOptionsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Kurs kaufen</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row g-5">
                            <!-- Guest Purchase -->
                            <div class="col-md-6">
                                <div class="card card-custom card-borderless h-100">
                                    <div
                                        class="card-body text-center d-flex flex-column justify-content-between align-items-center">
                                        <i class="ki-duotone ki-user-tick fs-2hx text-info mb-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="text-box">
                                            <h3 class="card-title">Als Gast kaufen</h3>
                                            <p class="text-muted mb-5">Bestelle schnell und unkompliziert – ganz ohne
                                                Registrierung.</p>
                                        </div>
                                        <button type="button" class="btn btn-info w-100"
                                            onclick="showGuestPurchaseForm()">Als Gast fortfahren</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Login/Register -->
                            <div class="col-md-6">
                                <div class="card card-custom card-borderless h-100">
                                    <div
                                        class="card-body text-center d-flex flex-column justify-content-between align-items-center">
                                        <i class="ki-duotone ki-profile-user fs-2hx text-primary mb-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        <div class="text-box">
                                            <h3 class="card-title">Mit Konto kaufen</h3>
                                            <p class="text-muted mb-5">Melde dich an oder registriere dich – und profitiere
                                                von exklusiven Rabatten sowie weiteren Vorteilen.</p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('login') }}" class="btn btn-primary w-100">Anmelden</a>
                                            <a href="{{ route('register') }}"
                                                class="btn btn-success w-100">Registrieren</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-landing-layout>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}', {
            locale: 'de'
        });
        const elements = stripe.elements();
        let card = null; // Single card element
        let currentCourseId = null;

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
            }
            return card;
        }

        // Show Stripe form
        function showStripeForm(courseId, index) {
            // First unmount the card if it's mounted
            if (card) {
                try {
                    card.unmount();
                } catch (e) {
                    console.log('Card was not mounted');
                }
            }

            @if (!auth()->check())
                // For guests, show form in modal
                const form = document.getElementById('stripe-form-guest');
                if (form) {
                    // Hide all other forms first
                    document.querySelectorAll('[id^="stripe-form-"]').forEach(f => {
                        f.style.display = 'none';
                    });

                    form.style.display = 'block';
                    const cardElement = initializeCard();
                    cardElement.mount('#card-element-guest');
                    currentCourseId = courseId;
                    const paymentForm = document.getElementById('payment-form-guest');
                    if (paymentForm) {
                        paymentForm.dataset.courseId = courseId;
                    }
                }
            @else
                // For registered users, show form below buttons
                const form = document.getElementById(`stripe-form-${index}`);
                if (form) {
                    // Hide all other forms first
                    document.querySelectorAll('[id^="stripe-form-"]').forEach(f => {
                        f.style.display = 'none';
                    });

                    // Show the selected form
                    form.style.display = 'block';

                    // Initialize and mount card element for this form
                    const cardElement = initializeCard();
                    cardElement.mount(`#card-element-${index}`);

                    currentCourseId = courseId;
                    const paymentForm = document.getElementById(`payment-form-${index}`);
                    if (paymentForm) {
                        paymentForm.dataset.courseId = courseId;
                    }
                }
            @endif
        }

        // Hide Stripe form
        function hideStripeForm(index) {
            @if (!auth()->check())
                const form = document.getElementById('stripe-form-guest');
                if (form) {
                    form.style.display = 'none';
                    if (card) {
                        try {
                            card.unmount();
                        } catch (e) {
                            console.log('Card was not mounted');
                        }
                    }
                }
            @else
                const form = document.getElementById(`stripe-form-${index}`);
                if (form) {
                    form.style.display = 'none';
                    if (card) {
                        try {
                            card.unmount();
                        } catch (e) {
                            console.log('Card was not mounted');
                        }
                    }
                }
            @endif
        }

        // Handle form submission
        document.querySelectorAll('[id^="payment-form-"]').forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const index = this.id.split('-')[2];
                const submitButton = document.getElementById(`submit-button-${index}`);
                const courseId = this.dataset.courseId;

                // Disable submit button
                submitButton.disabled = true;
                submitButton.querySelector('.indicator-label').style.display = 'none';
                submitButton.querySelector('.indicator-progress').style.display = 'inline-block';

                try {
                    const requestBody = {
                        course_id: courseId,
                        payment_method: 'stripe'
                    };

                    // Add email for guest mode
                    @if (!auth()->check())
                        const email = document.querySelector('#guestPurchaseForm [name="email"]').value;
                        requestBody.email = email;
                    @endif

                    const response = await fetch('{{ route('course.payment.create') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(requestBody)
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
                        '{{ route('course.payment.success') }}?payment_method=stripe&course_id=' +
                        courseId + '&paymentIntentId=' + data.paymentIntentId;
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
        async function initiatePayment(paymentMethod, courseId) {
            if (paymentMethod === 'stripe') {
                showStripeForm(courseId, courseId);
                return;
            }

            @if (auth()->check())
                const twintButton = document.getElementById(`twint-button-${courseId}`);
            @else
                const twintButton = document.getElementById(`twint-button-guest`);
            @endif

            if (twintButton) {
                twintButton.disabled = true;
                twintButton.querySelector('.indicator-label').style.display = 'none';
                twintButton.querySelector('.indicator-progress').style.display = 'inline-block';
            }

            try {
                const requestBody = {
                    course_id: courseId,
                    payment_method: paymentMethod
                };

                // Add email for guest mode
                @if (!auth()->check())
                    const email = document.querySelector('#guestPurchaseForm [name="email"]').value;
                    requestBody.email = email;
                @endif

                const response = await fetch('{{ route('course.payment.create') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(requestBody)
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

        // Handle purchase button click (only for guests)
        function handlePurchase(courseId) {
            currentCourseId = courseId;
            const modal = new bootstrap.Modal(document.getElementById('purchaseOptionsModal'));
            modal.show();
        }

        // Show guest purchase form
        function showGuestPurchaseForm() {
            const purchaseOptionsModal = bootstrap.Modal.getInstance(document.getElementById('purchaseOptionsModal'));
            purchaseOptionsModal.hide();

            const guestPurchaseModal = new bootstrap.Modal(document.getElementById('guestPurchaseModal'));
            guestPurchaseModal.show();
        }

        // Add checkbox change event listener
        document.getElementById('termsCheckbox')?.addEventListener('change', function() {
            const paymentButtons = document.querySelector('.payment-buttons');
            if (paymentButtons) {
                paymentButtons.style.display = this.checked ? 'block' : 'none';
            }
        });

        // Update guest purchase form submission
        document.getElementById('guestPurchaseForm')?.addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = this.querySelector('[name="email"]').value;
            const termsAccepted = this.querySelector('#termsCheckbox').checked;

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
                showStripeForm(currentCourseId, currentCourseId);
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
    </script>
