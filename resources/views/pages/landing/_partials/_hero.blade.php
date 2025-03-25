<!--begin::Landing hero-->
<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-800px px-9 z-index-1"
    style="    background-image: url(/media/landing/hero.jpg);
    background-repeat: no-repeat;
    mix-blend-mode: normal;
    background-size: cover;">
    <div class="cloud">
        <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
            data-framer-background-image-wrapper="true">
            <img decoding="async" loading="lazy" src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png"
                alt=""
                style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
        </div>
    </div>
    <!--begin::Heading-->
    <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
        <!--begin::Title-->
        <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Wir erkennen, wissen und
            <br />transformieren mit Magie
            <span
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                {{-- <span id="kt_landing_hero_text"></span> --}}
            </span>
        </h1>
        <p class="fs-1 fs-md-1x fs-lg-2x mb-15 font-archivo">Seelenflüsterin Sarah</p>
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
