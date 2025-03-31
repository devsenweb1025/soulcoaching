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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Preise
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">
                Melde dich jetzt und profitiere von unschlagbaren Preisen
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Pricing Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-1"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-start">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Transformationscoaching</h1>
                        <div class="text-gray-600 fw-semibold fs-5">erhalte ein Coaching nach meinem
                            eigenen Konzept auf allen 5 Bewusstseins ebenen und profitiere von
                            folgenden Inhalten
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-start" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-4 col-md-6" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest">Transformationscoaching</h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="text-start">
                                                {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                                <span class="fs-3x fw-bold text-primary">CHF 1800</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span
                                                    class="fw-semibold fs-6 text-gray-800 text-start pe-3">Booklet</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">1x Zoom
                                                    Meetings</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Fairer Preis</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Mein eigenes Konzept</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" class="btn btn-primary">Jetzt Buchen!</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-8 col-md-6" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/coaching.webp') }})">
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
        <div class="clouds-2"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-end">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Sensitive mediale Beratung</h1>
                        <div class="text-gray-600 fw-semibold fs-5">erhalte ein Coaching nach meinem eigenen Konzept auf
                            allen 5 Bewusstseins ebenen und profitiere von folgenden Inhalten
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-start" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-8 col-md-6" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/courses-2.webp') }})">
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4 col-md-6" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest">Transformationscoaching</h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="text-start">
                                                {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                                <span class="fs-3x fw-bold text-primary">CHF 1800</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span
                                                    class="fw-semibold fs-6 text-gray-800 text-start pe-3">Booklet</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">1x Zoom
                                                    Meetings</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Fairer Preis</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Mein eigenes Konzept</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" class="btn btn-primary">Jetzt Buchen!</a>
                                        <!--end::Select-->
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
                            data-kt-scroll-offset="{default: 100, lg: 150}">Tierkommunikation</h1>
                        <div class="text-gray-600 fw-semibold fs-5">erhalte ein Coaching nach meinem
                            eigenen Konzept auf allen 5 Bewusstseins ebenen und profitiere von
                            folgenden Inhalten
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-start" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-4 col-md-6" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest">Transformationscoaching</h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="text-start">
                                                {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                                <span class="fs-3x fw-bold text-primary">CHF 1800</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span
                                                    class="fw-semibold fs-6 text-gray-800 text-start pe-3">Booklet</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">1x Zoom
                                                    Meetings</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Fairer Preis</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Mein eigenes Konzept</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" class="btn btn-primary">Jetzt Buchen!</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-8 col-md-6" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/tier.webp') }})">
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
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-end">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Gruppenseminare</h1>
                        <div class="text-gray-600 fw-semibold fs-5">erhalte ein Coaching nach meinem eigenen Konzept
                            auf
                            allen 5 Bewusstseins ebenen und profitiere von folgenden Inhalten
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-start" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-8 col-md-6" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="w-100 h-100 object-fit-cover"
                                    style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/medial.webp') }})">
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4 col-md-6" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-start">
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest">Transformationscoaching</h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="text-start">
                                                {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                                <span class="fs-3x fw-bold text-primary">CHF 1800</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span
                                                    class="fw-semibold fs-6 text-gray-800 text-start pe-3">Booklet</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">1x Zoom
                                                    Meetings</span>
                                                <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Fairer Preis</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800">
                                                    Mein eigenes Konzept</span>
                                                <i class="ki-duotone ki-check-circle text-success fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" class="btn btn-primary">Jetzt Buchen!</a>
                                        <!--end::Select-->
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
