<div class="position-relative">
    <div class="clouds-2"></div>
    <!--begin::Testimonials Section-->
    <div class="mt-20 position-relative z-index-1">
        <!--begin::Container-->
        <div class="container">
            <div class="card shadow-sm bg-gray-300" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                data-aos-delay="0">
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center">
                            <!--begin::Testimonial-->
                            <div class="mb-2 w-100" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500"
                                data-aos-delay="0">
                                <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/sarah-barone-seelenfluesterin-businessportrait-am-see.webp') }}"
                                    class="w-100 h-auto rounded"
                                    alt="Sarah, die Seelenflüsterin, im Business-Outfit am Seeufer – Porträtaufnahme in natürlicher Umgebung">
                            </div>
                            <!--end::Testimonial-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center">
                            <!--begin::Testimonial-->
                            <div class="p-lg-10 p-md-5">
                                <!--begin::Wrapper-->
                                <div class="mb-2">
                                    <h1 class="mb-10 mb-md-10 mb-sm-5 text-md-center fs-3x font-cinzel"
                                        data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                                        data-aos-delay="0">
                                        Willkommen liebe Seele
                                    </h1>
                                    <div data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500"
                                        data-aos-delay="0">
                                        <div class="text-gray-600 fs-4 mb-5">
                                            Spürst du den inneren Ruf nach Heilung, um in den Fluss des Lebens zu kommen? Um ein leichtes Leben zu manifestieren und in deine Energie zu gelangen?
                                        </div>
                                        <div class="text-gray-600 fs-4 mb-5">
                                            Deine Seele hat dich hierher geführt, um den besonderen Weg zur ganzheitlichen Heilung zu entdecken.
                                        </div>
                                        <div class="text-gray-600 fs-4 mb-5">
                                            Das Seelenflüsterin Transformationskonzept <br/>(© 2025 Seelenflüsterin) löst Blockaden auf allen 5 Bewusstseinsebenen und macht deine Heilung schnell wirksam und nachhaltig.
                                        </div>
                                        <div class="text-gray-600 fs-4 mb-5">
                                            Als ersten Schritt lade ich dich zu einer geführten Meditation ein. Lausche entspannt meiner Stimme.
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8 d-flex align-items-center">
                                            <audio controls class="w-100">
                                                <source
                                                    src="{{ asset(theme()->getMediaUrlPath() . 'audio/welcome.m4a') }}"
                                                    type="audio/mpeg" />
                                                Audio not supported
                                            </audio>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-end">
                                            <a href="{{ route('services') }}" class="btn btn-primary">
                                                Mehr entdecken
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Testimonial-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
            </div>
        </div>
        <!--end::Container-->

        <!--begin::Partner Carousel-->
        <div class="tns tns-default" style="direction: ltr" data-aos="fade-up" data-aos-easing="linear"
            data-aos-duration="500" data-aos-delay="0">
            <!--begin::Slider-->
            <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="3000"
                data-tns-autoplay="true" data-tns-autoplay-timeout="2000" data-tns-autoplay-hover-pause="false"
                data-tns-controls="false" data-tns-nav="false" data-tns-items="1" data-tns-slide-by="1"
                data-tns-responsive="{768:{items:3},992:{items:5},1200:{items:5}}">
                @foreach ($partners as $partner)
                <!--begin::Item-->
                <div class="px-5 py-5">
                    <div class="d-flex align-items-center justify-content-center" style="height: 100px;">
                        <a href="{{ $partner->domain }}" target="_blank">
                            <img src="{{ asset('storage/partners/' . $partner->image) }}" alt="{{ $partner->name }}"
                                class="img-fluid" style="max-height: 100px; width: auto;">
                        </a>
                    </div>
                </div>
                <!--end::Item-->
                @endforeach
            </div>
            <!--end::Slider-->
        </div>
        <!--end::Partner Carousel-->
    </div>
    <!--end::Testimonials Section-->
</div>