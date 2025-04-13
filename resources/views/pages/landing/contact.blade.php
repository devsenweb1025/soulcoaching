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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Erreichen Sie mich jederzeit
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                Hast du Fragen zu einer Sitzung in spiritueller Lebensberatung, energetischem Heilen, Tierkommunikation
                oder zum Ablauf eines spirituellen Coachings?<br /><br />
                Ich bin für dich da – ob du in der Schweiz, in Österreich oder Deutschland lebst.<br /><br />
                Schreib mir direkt über das Kontaktformular oder ruf mich an – ich freue mich auf deine Anfrage.
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->
    <div class="position-relative">
        <div class="clouds-2"></div>
        <!--begin::Testimonials Section-->
        <div class="mt-20 mb-20 position-relative z-index-2">
            <!--begin::Container-->
            <div class="container mt-4">
                <div class="row">
                    <!-- Sticky Sidebar -->
                    <div class="col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="sticky-sidebar p-3 border rounded"
                            style="position: sticky; top: 150px; height: fit-content;">
                            <div class="card shadow mb-15 p-10">
                                <div class="card-body">
                                    <div class="mb-15 mb-md-10 mb-sm-5 fs-2x d-flex align-items-center">
                                        <span
                                            class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-5">
                                            {!! theme()->getIcon('sms', 'fs-2tx text-primary') !!}
                                        </span>
                                        <span class="ml-5">Maile mir</span>
                                    </div>
                                    <div class="text-gray-800 fs-2 mb-5">
                                        Fragen zu den Angeboten oder sonstiges anliegen? Du kannst mir gerne per Mail
                                        schreiben.
                                    </div>
                                    <span class="fw-normal fs-4">
                                        <a href="mailto:info@seelen-fluesterin.ch"
                                            class="text-hover-primary">info@seelen-fluesterin.ch</a></span>
                                </div>
                            </div>

                            <div class="card shadow mb-15 p-10">
                                <div class="card-body">
                                    <div class="mb-15 mb-md-10 mb-sm-5 fs-2x d-flex align-items-center">
                                        <span
                                            class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-5">
                                            {!! theme()->getIcon('user', 'fs-2tx text-primary') !!}
                                        </span>
                                        <span class="ml-5">Zoom Meeting</span>
                                    </div>
                                    <div class="text-gray-800 fs-2 mb-5">
                                        Hast Du ein grösseres Anliegen und möchtest ein Gespräch mit mir? Melde dich
                                        über das Kontaktformular und wir vereinbaren gemeinsam einen Termin.
                                    </div>
                                    <span class="fw-normal fs-4">
                                        <a href="#" class="text-hover-primary">Termin Buchen</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Long Scrolling Content -->
                    <div class="col-md-6 p-3 border rounded" data-aos="zoom-in" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow mb-15 p-10">
                            <div class="card-body">
                                <div
                                    class="mb-15 mb-md-10 mb-sm-5 fs-2x d-flex flex-column justify-content-center align-items-center">
                                    <div
                                        class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-5 mb-5">
                                        {!! theme()->getIcon('user', 'fs-2tx text-primary') !!}
                                    </div>
                                    <div class="text-center">Gerne helfe ich Dir weiter!<br />Melde dich bei mir.</div>
                                </div>
                                <div class="text-gray-800 fs-2 mb-5">
                                    <form>
                                        <div class="mb-10">
                                            <label for="name_input" class="required form-label">Vor- und
                                                Nachname</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Max Muster" id="name_input">
                                        </div>
                                        <div class="mb-10">
                                            <label for="email_input" class="required form-label">Mail Adresse</label>
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="maxmuster@hotmail.com" id="email_input">
                                        </div>
                                        <div class="mb-10">
                                            <label for="phone_input" class="required form-label">Telefonnummer</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="+41" id="phone_input">
                                        </div>
                                        <div class="mb-10">
                                            <label for="reason_input" class="required form-label">Um welche
                                                Dienstleistung handelt es sich?</label>
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="Dienstleistung und Produkt angeben" id="reason_input">
                                        </div>
                                        <div class="mb-10">
                                            <label for="description_input" class="required form-label">Beschreiben Sie
                                                ihr Anliegen</label>
                                            <textarea class="form-control form-control-solid" placeholder="Ihre Nachricht" id="description_input"
                                                style="height: 100px"></textarea>
                                        </div>
                                        <div class="mb-10">
                                            <input type="checkbox" id="confirm_input" class="form-check-input">
                                            <label for="confirm_input" class="form-check-label fs-6">Hiermit bestätige ich,
                                                dass alle Angaben wahrheitsgetreu gemacht wurden.</label>
                                        </div>
                                        <div>
                                            <button type="submit" class="form-control btn btn-primary">Nachricht
                                                senden</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Testimonials Section-->
    </div>

    <div class="position-relative">
        <div class="clouds-2"></div>
        <!--begin::Testimonials Section-->
        <div class="mt-20 mb-20 position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <div class="card shadow-sm bg-gray-300" data-aos="zoom-in" data-aos-easing="linear"
                    data-aos-duration="500" data-aos-delay="0">
                    <div class="card-body">

                        <div class="card-title d-flex flex-column align-items-center text-center mt-20 mb-10"
                            data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                            <div class="header-title fs-4x font-cinzel">Meist gestellte Fragen</div>
                            <div class="header-sub fs-2 text-gray-700">Finde schnell Antworten zu deinen Fragen</div>
                        </div>

                        <div class="container">

                            <!--begin::Accordion-->
                            <div class="accordion accordion-solid accordion-icon-collapse" id="kt_accordion_3"
                                data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                                data-aos-delay="0">
                                <!--begin::Item-->
                                <div class="mb-5 bg-white rounded px-10 py-5 shadow">
                                    <!--begin::Header-->
                                    <div class="accordion-header py-3 d-flex justify-content-between"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_1">
                                        <h3 class="fs-2 fw-semibold mb-0 ms-4">Was ist der Unterschied von einem
                                            Coaching zu
                                            einem
                                            spirituellen Coaching?</h3>

                                        <span class="accordion-icon">
                                            {!! theme()->getIcon('down', 'fs-2x accordion-icon-off') !!}
                                            {!! theme()->getIcon('up', 'fs-2x accordion-icon-on') !!}
                                        </span>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="kt_accordion_3_item_1" class="fs-3 collapse show px-10"
                                        data-bs-parent="#kt_accordion_3">
                                        Mein Coaching ist kein herkömmliches, weil ich mich vor dem Coaching mit deinem
                                        System
                                        verbinde und dadurch Inputs für dich bekomme. Ausserdem werden wir nicht nur auf
                                        Mentaler
                                        Ebene arbeiten, sondern beziehen deine Seele immer mit ein. So kommst du
                                        schneller
                                        und
                                        mit
                                        Herz an dein Ziel. Alle 5 Bewusstseinsebenen werden eingebaut.
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="mb-5 bg-white rounded px-10 py-5 shadow">
                                    <!--begin::Header-->
                                    <div class="accordion-header py-3 d-flex collapsed justify-content-between"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_2">
                                        <h3 class="fs-2 fw-semibold mb-0 ms-4">Woher weisst du was mein Körper braucht?
                                        </h3>

                                        <span class="accordion-icon">
                                            {!! theme()->getIcon('down', 'fs-2x accordion-icon-off') !!}
                                            {!! theme()->getIcon('up', 'fs-2x accordion-icon-on') !!}
                                        </span>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="kt_accordion_3_item_2" class="collapse fs-3 ps-10"
                                        data-bs-parent="#kt_accordion_3">
                                        Yes, Alter is built with SEO-friendly practices to help your website rank better
                                        on
                                        search
                                        engines.
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="mb-5 bg-white rounded px-10 py-5 shadow">
                                    <!--begin::Header-->
                                    <div class="accordion-header py-3 d-flex collapsed justify-content-between"
                                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_3">
                                        <h3 class="fs-2 fw-semibold mb-0 ms-4">Wie funktioniert Tierkommunikation?</h3>
                                        <span class="accordion-icon">
                                            {!! theme()->getIcon('down', 'fs-2x accordion-icon-off') !!}
                                            {!! theme()->getIcon('up', 'fs-2x accordion-icon-on') !!}
                                        </span>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="kt_accordion_3_item_3" class="collapse fs-3 ps-10"
                                        data-bs-parent="#kt_accordion_3">
                                        Bevor ich mich mit deinem Herzenstier verbinde mache ich diverse Vorbereitungen,
                                        dass
                                        alles
                                        positiv ist und alles zum Besten wohl passieren kann. Danach nehme ich Geistig
                                        Kontakt
                                        auf
                                        und stelle deine Fragen an dein Herzenstier.
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Accordion-->
                        </div>

                        <div class="text-center d-flex justify-content-center align-items-center mt-10">
                            {!! theme()->getIcon('directbox-default', 'fs-2x accordion-icon-off') !!}
                            <span class="ms-2">Keine Antwort dabei? Dann melde dich per Kontaktformular</span>

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Testimonials Section-->
    </div>

</x-landing-layout>
