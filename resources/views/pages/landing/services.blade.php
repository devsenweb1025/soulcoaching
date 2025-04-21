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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Dienstleistungen
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                Entdecke mein vielseitiges Angebot rund um spirituelles Coaching, energetisches Heilen,
                Tierkommunikation, Kartenlegen und meine spirituelle Hotline.<br /><br />
                Ob du dich in einer Lebenskrise befindest, deine Chakren reinigen möchtest oder Hilfe bei der
                Verbindung
                zu deinem Tier suchst – ich begleite dich mit Herz und Intuition auf deinem Weg zu mehr Klarheit,
                Energie und Selbstheilung.
            </p>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">

            </p>
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
                    <div class="col-lg-3" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="card card-shadow shadow card-borderless mb-5 bg-gray-300">
                            <div class="card-header">
                                <h2 class="card-title fs-2 fw-bold">
                                    {{ $service['title'] }}
                                </h2>
                            </div>
                            <div class="card-body fs-4">
                                <div class="text-gray-600 fw-semibold fs-5 description-text">
                                    @php
                                        $text = $service['description'];
                                        $shortText = strlen($text) > 174 ? substr($text, 0, 174) . '...' : $text;
                                    @endphp
                                    <span class="short-text">{{ $shortText }}</span>
                                    <span class="full-text" style="display: none;">{{ $text }}</span>
                                </div>
                                <a href="#" class="text-primary show-more-link">Mehr anzeigen</a>
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
    <!--begin::Wrapper-->
    <div class="py-20 landing-light-bg rounded position-relative" id="hotline-section">
        <div class="clouds-2"></div>
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 z-index-2">
            <!--begin::Heading-->
            <div class="d-flex flex-column flex-center text-center mb-10 mb-lg-10 h-100 z-index-2">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Hotline für Kartenlegung<div
                        class="fw-bolder">0901 881 881</div>
                    <span
                        style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        {{-- <span id="kt_landing_hero_text"></span> --}}
                    </span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Container-->
            <div class="container z-index-2">
                <div class="row h-100 z-index-2">
                    <div class="col-12 col-md-6 col-lg-5 d-flex flex-column" data-aos="zoom-in" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <!--begin::Image input-->
                        <div class="w-100 h-100 py-lg-10 py-md-5 d-flex flex-column justify-content-center align-items-center"
                            data-kt-image-input="true">

                            <!--begin::Image preview wrapper-->
                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/customer.jpeg') }}" alt=""
                                class="w-50 mb-5">
                            <!--end::Image preview wrapper-->

                            <!--begin::Image preview wrapper-->
                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/customer-temp.png') }}"
                                alt="" class="w-50 d-none d-md-block">
                            <!--end::Image preview wrapper-->

                            <div class="text-center d-md-flex d-none justify-content-center align-items-center mt-10">
                                {!! theme()->getIcon('faceid', 'fs-2hx text-gray-700') !!}
                                <span class="ms-2 fs-xs-2 fs-sm-2 fs-md-2x text-gray-700">Hier könnte dein Bild
                                    sein.</span>
                            </div>
                        </div>
                        <!--end::Image input-->
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <!--begin::Testimonial-->
                        <div class="p-lg-10 p-md-5">
                            <!--begin::Wrapper-->
                            <div class="mb-2 text-start">
                                <h1 class="text-primary fw-bolder lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">
                                    NEU!
                                </h1>
                                <div class="text-gray-600 fs-2 mb-5">
                                    Brauchst du schnelle und kompetente Unterstützung?
                                </div>
                                <div class="text-gray-600 fs-2 mb-5">
                                    Dann ruf jetzt die Seelenflüsterin-Hotline unter 0901 881 881 an und erhalte deine
                                    intuitive Kartenlegung bequem über das Telefon – ganz ohne Wartezeit, vertrauensvoll
                                    und direkt auf deine Frage abgestimmt.
                                </div>
                                <div class="text-gray-600 fw-bold fs-2 fw-bolder">
                                    Ruf die liebenswürdige Elisabeth an:
                                </div>
                                <div class="text-gray-600 fs-2 mb-5">
                                    Ich möchte mit meinen Fähigkeiten Menschen helfen, die Probleme haben oder denen der
                                    gegenwärtige klare Blick für das Wesentliche verloren gegangen ist. Ich verfüge über
                                    eine sehr ausgeprägte Feinfühligkeit und habe seit 17 Jahren eine starke Bindung zu
                                    meinen Kipper - Karten.
                                    Sei nicht ängstlich. Jeder Mensch hat mal Probleme. Aber die können wir gemeinsam
                                    lösen.<br />
                                </div>
                                <div class="text-gray-600 fw-bold fs-2 fw-bolder">
                                    Elisabeth ist Kartenlegerin in der 4. Generation du bist also in den Besten
                                    Händen!<br /><br />
                                </div>
                                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                                    Zeiten:<br />
                                    Dienstag: 18:00 – 23:00 Uhr<br />
                                    Mittwoch: 15:00 – 23:00 Uhr<br />
                                    Freitag: 08:00 – 23:00 Uhr<br />
                                    Samstag: 08:00 – 23:00 Uhr<br />
                                    Sonntag: 10:00 – 17:30 Uhr
                                </div>
                                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                                    @chf(2.5).- / min
                                </div>
                                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                                    Diese Hotline eignet sich ideal für:<br />
                                </div>
                                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                                    🔮 Lenormand-Kartenlegung <br />
                                    🔮 Hellsehen per Telefon<br />
                                    🔮 Spirituelle Lebensfragen (Liebe, Beruf, Klarheit)
                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center mb-10">
                                    <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/customer-temp.png') }}"
                                        alt="" class="w-50 d-md-none d-block">
                                    <div
                                        class="text-center d-flex justify-content-center align-items-center mt-10 d-md-none d-block">
                                        {!! theme()->getIcon('faceid', 'fs-2hx text-gray-700') !!}
                                        <span class="ms-2 fs-xs-2 fs-sm-2 fs-md-2x text-gray-700">Hier könnte dein Bild
                                            sein.</span>
                                    </div>
                                </div>
                                <div class="text-gray-600 fs-2 fw-bolder mb-5">
                                    Möchtest auch du einmal die Hotline bedienen?<br />
                                    Dann melde Dich bei mir über das Kontaktformular und vielleicht bedienst schon bald
                                    du die Hotline.
                                </div>
                                <div>
                                    <div class="d-flex justify-content-start align-items-center mb-5">
                                        <a href="{{ route('contact') }}" class="btn btn-primary">Kontaktformular</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Testimonial-->
                    </div>
                </div>

            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Wrapper-->

</x-landing-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showMoreLinks = document.querySelectorAll('.show-more-link');

        showMoreLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const descriptionText = this.previousElementSibling;
                const shortText = descriptionText.querySelector('.short-text');
                const fullText = descriptionText.querySelector('.full-text');
                const isExpanded = fullText.style.display !== 'none';

                if (isExpanded) {
                    fullText.style.display = 'none';
                    shortText.style.display = 'inline';
                    this.textContent = 'Mehr anzeigen';
                } else {
                    fullText.style.display = 'inline';
                    shortText.style.display = 'none';
                    this.textContent = 'Weniger anzeigen';
                }
            });
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
