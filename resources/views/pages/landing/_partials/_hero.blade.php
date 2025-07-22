<!--begin::Landing hero-->
<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-800px px-9 z-index-1"
    style="background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/startseite-transformation-5-bewusstseinsebenen-seelenfluesterin.webp') }});
    background-repeat: no-repeat;
    mix-blend-mode: normal;
    background-size: cover;">
    <!--begin::Heading-->
    <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
        <!--begin::Title-->
        <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Transformation auf 5
            <br />Bewusstseinsebenen
            <span
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                {{-- <span id="kt_landing_hero_text"></span> --}}
            </span>
        </h1>
        <h1 class="text-dark lh-base fs-2 fs-md-2x fs-lg-3x font-cinzel">Erkennen | Wissen | Transformieren
            <br />mit Magie
            <span
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                {{-- <span id="kt_landing_hero_text"></span> --}}
            </span>
        </h1>
        <p class="fs-1 fs-md-1x fs-lg-2x mb-15 font-archivo">Herzlich Willkommen bei Seelenflüsterin Sarah</p>
        <!--end::Title-->
        <!--begin::Action-->
        <div class="d-flex justify-content-center">
            <a href="{{ route('services') }}" class="btn btn-primary mx-5">
                Dienstleistungen
                {!! theme()->getIcon('black-right', 'fs-1 text-white') !!}
            </a>
            <a href="{{ route('about') }}" class="btn btn-gradient-dark mx-5">Über mich</a>
        </div>

        <!--end::Action-->
    </div>
    <!--end::Heading-->
</div>
<!--end::Landing hero-->
