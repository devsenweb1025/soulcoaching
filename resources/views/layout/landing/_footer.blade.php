<!--begin::Footer Section-->
<div class="mb-0 z-index-2">
    <!--begin::Wrapper-->
    <div class="landing-dark-bg pt-10">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row py-10 py-lg-10">
                <div class="col-lg-2 mb-10 mb-lg-0 p-1 p-md-10">
                    <div class="d-flex align-items-center justify-content-center order-2 order-md-1">
                        <!--begin::Logo-->
                        <a href="landing.html">
                            <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/landing-dark.png') }}"
                                class="h-50px h-md-100px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                </div>

                <!--begin::Col-->
                <div class="col-lg-6 ps-lg-16">
                    <!--begin::Navs-->
                    <div class="d-flex justify-content-between p-10">
                        <!--begin::Links-->
                        <div class="d-flex fw-semibold flex-column me-20">
                            <!--begin::Subtitle-->
                            <h4 class="fw-bold text-gray-500 mb-6">Schnellzugriff</h4>
                            <!--end::Subtitle-->
                            <!--begin::Link-->
                            <a href="{{ route('home') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Start</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('about') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Über mich</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('medien') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Medien & Partner</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('services') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Dienstleistungen</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('prices') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Preise</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('course') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Online Kurse</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('shop.index') }}"
                                class="text-gray-600 text-hover-white fs-5 mb-6">Online Shop</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{ route('contact') }}"
                                class="text-gray-600 text-hover-white fs-5">Kontakt</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->
                        <!--begin::Links-->
                        <div class="d-flex fw-semibold flex-column ms-lg-20">
                            <!--begin::Subtitle-->
                            <h4 class="fw-bold text-gray-500 mb-6">Folge mir gerne auf</h4>
                            <!--end::Subtitle-->
                            <!--begin::Link-->
                            <a href="https://tiktok.com/@seelenfluesterin6" class="mb-6">
                                <img src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/tiktok-dark.svg') }}"
                                    class="h-20px me-2" alt="" />
                                <span class="text-gray-600 text-hover-white fs-5 mb-6">TikTok</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://instagram.com/seelenfluesterin6" class="mb-6">
                                <img src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/instagram-2-1.svg') }}"
                                    class="h-20px me-2" alt="" />
                                <span class="text-gray-600 text-hover-white fs-5 mb-6">Instagram</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://api.whatsapp.com/send?phone=41798227602" class="mb-6">
                                <img src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/whatsapp.svg') }}"
                                    class="h-20px me-2 bg-white rounded-1" alt="" />
                                <span class="text-gray-600 text-hover-white fs-5 mb-6">Whatsapp</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://facebook.com/sarah.barone.12" class="mb-6">
                                <img src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/facebook-4.svg') }}"
                                    class="h-20px me-2" alt="" />
                                <span class="text-gray-600 text-hover-white fs-5 mb-6">Facebook</span>
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Navs-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-4 pe-lg-16 mb-10 mb-lg-0 p-10">
                    <!--begin::Block-->
                    <div class="d-flex flex-column justify-content-center">
                        <!--begin::Title-->
                        <h2 class="fw-bold text-gray-500 mb-6">Rechtliche Informationen</h2>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="text-gray-600 fs-5 mb-6">
                            <a href="{{ route('impressum') }}" class="text-gray-600 text-hover-white">Impressum</a>
                        </div>
                        <div class="text-gray-600 fs-5 mb-6">
                            <a href="{{ route('datenschutz') }}" class="text-gray-600 text-hover-white">Datenschutzerklärung</a>
                        </div>
                        <div class="text-gray-600 fs-5 mb-6">
                            <a href="{{ route('agb') }}" class="text-gray-600 text-hover-white">Allgemeine Geschäftsbedingungen</a>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Block-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-gray-600 fs-5">
                        <span class="text-gray-600">Website wurde erstellt von </span>
                        <a href="https://magentix.ch" target="_blank" class="text-gray-600 text-hover-white">MAGENTIX</a>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        <!--begin::Separator-->
        <div class="landing-dark-separator"></div>
        <!--end::Separator-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Footer Section-->
