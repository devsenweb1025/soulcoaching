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
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Online Kurs - Seelenacademy
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">
                Die Seelenacademy bringt dich in deine Ursprungskraft zurück, nämlich in die Selbstheilung. In
                verschiedenen Kursen lernst du was bedeutet es ein energetisches Wesen zu sein, was bedeuten deine
                Schmerzen, wie kannst du dich selbst heilen und deine Energie verbessern, damit du mehr Lebenskraft
                hast.
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Pricing Section-->
    <div class="mt-sm-n20 position-relative mt-20 mb-20">
        <div class="clouds-1"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
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
                            <div class="col-xl-4 col-md-6" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
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
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Du dein Wissen über die Chakren
                                                    erweitern willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wissen willst welche Chakren,
                                                    welche Körperliche Beschwerden auslösen können
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wissen willst, welche Chakren,
                                                    welche mentalen Beschwerden hervorrufen können
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wie du die Chakren reinigen kannst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wie du die Chakren stärken kannst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wenn du dich unwohl, müde und
                                                    schlapp fühlst es aber keinen Grund dafür gibt
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deine Selbstheilung voran bringen
                                                    willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Voraussetzung für das Verständnis
                                                    des Energetischen Heilen Kurses
                                                </li>
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
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Schmerzen & Chakra Kurs: CHF 480.-
                                                </li>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Wie läuft das ab:
                                            </h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="d-flex flex-column">
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Buche den Kurs mit dem
                                                    untenstehenden Formular
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Zahle den Kurs per Twint im Voraus
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Nach Zahlungseingang erhältst du
                                                    einen Link und ein Passwort und schon geht es los
                                                </li>
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
                            <div class="col-xl-8 col-md-6" data-aos="flip-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-300px h-md-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses/chakra.jpg') }})">
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
    <div class="mt-sm-n20 position-relative mt-20 mb-20">
        <div class="clouds-1"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-start">
                        <h1 class="fs-2hx fw-bold mb-5 text-center font-cinzel text-primary" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Kompletter Kurs Energetisches Heilen</h1>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-start" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-12" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="text-start">
                                            <!--begin::Title-->
                                            <div class="text-gray-900 mb-5 fw-boldest">
                                                Energetisches Heilen ist
                                                mehr als nur Handauflegen. Es ist eine Haltung. Es gibt Gesetze an die
                                                man sich halten soll und auch Regeln die man nicht missachten darf.
                                                Darum ist unser Kurs in Theorie und Praxis aufgeteilt.

                                                Beachte, dass der Chakra Kurs das Vorverständnis für den energertischen
                                                Heiler Kurs darstellt.
                                            </div>
                                            <!--end::Title-->

                                            <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Energieaustausch:
                                            </h1>

                                            <div class="text-gray-900 fw-boldest">
                                                Kompletter Energetischer Heilkurs CHF 950.-
                                            </div>
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
    <div class="mt-sm-n20 position-relative mt-20 mb-20">
        <div class="clouds-3"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
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
                            <div class="col-xl-4 col-md-6" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
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
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Du dein Wissen über das
                                                    Energetische Heilen erweitern willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wissen willst wie Energetisches
                                                    Heilen funktioniert
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Dir Abhilfe im Alltag verschaffen
                                                    willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deinen Liebsten unterstützen
                                                    willst
                                                    kannst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deinem Herzenstier helfen willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deine Energie | Schwingung
                                                    erhöhen willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deiner Seelenaufgabe näher kommen
                                                    willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deine Selbstheilung voran bringen
                                                    willst
                                                </li>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Wie läuft das ab:
                                            </h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="d-flex flex-column">
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Buche den Kurs mit dem
                                                    untenstehenden Formular
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Zahle den Kurs per Twint im
                                                    Voraus
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Nach Zahlungseingang erhältst du
                                                    einen Link und ein Passwort und schon geht es los
                                                </li>
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
                            <div class="col-xl-8 col-md-6" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-300px h-md-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses/theorie.jpg') }})">
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
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-3"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
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
                            <div class="col-xl-8 col-md-6" data-aos="zoom-in-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-300px h-md-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses/praxis.jpg') }})">
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4 col-md-6" data-aos="zoom-in-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
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
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Du dein Wissen über das
                                                    Energetische Heilen erweitern willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Wissen willst wie Energetisches
                                                    Heilen funktioniert
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Dir Abhilfe im Alltag verschaffen
                                                    willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deinen Liebsten unterstützen
                                                    willst
                                                    kannst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deinem Herzenstier helfen willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deine Energie | Schwingung
                                                    erhöhen willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deiner Seelenaufgabe näher kommen
                                                    willst
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Deine Selbstheilung voran bringen
                                                    willst
                                                </li>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest fs-2">Wie läuft das ab:
                                            </h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="d-flex flex-column">
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Buche den Kurs mit dem
                                                    untenstehenden Formular
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Zahle den Kurs per Twint im
                                                    Voraus
                                                </li>
                                                <li class="d-flex align-items-center py-2">
                                                    <span class="bullet me-5"></span> Nach Zahlungseingang erhältst du
                                                    einen Link und ein Passwort und schon geht es los
                                                </li>
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


</x-landing-layout>
