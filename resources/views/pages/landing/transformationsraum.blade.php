<x-landing-layout>
    @section('title', 'Praxis für Transformation in Egnach – Seelenfluesterin')
    @section('description', 'Ein geschützter Raum in Egnach für deine Transformation. Individuelle Begleitung in persönlicher Atmosphäre mit Herz, Klarheit & Struktur.')
    
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
                Transformationsraum
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                Ein magischer Ort der Heilung, an dem du dich geborgen fühlen kannst. Hier darfst du loslassen, zur Ruhe kommen und neue Kraft für deine persönliche Transformation schöpfen
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>

    <!--begin::Office Images Section-->
    <div class="mt-sm-n20 position-relative mt-20 pb-20">
        <div class="clouds-1"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Content-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Images Grid-->
                    <div class="row g-10">
                        <!--begin::Image 1-->
                        <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                <div class="card-body p-0w-100 h-400px object-fit-cover rounded"
                                        style="background-repeat: no-repeat;background-size: 100% 100%;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/transformationsraum/office-1.webp') }}')">
                                </div>
                            </div>
                        </div>
                        <!--end::Image 1-->

                        <!--begin::Image 2-->
                        <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                <div class="card-body p-0w-100 h-400px object-fit-cover rounded"
                                        style="background-repeat: no-repeat;background-size:  100% 100%;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/transformationsraum/office-2.webp') }}')">
                                </div>
                            </div>
                        </div>
                        <!--end::Image 2-->

                        <!--begin::Image 3-->
                        <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                <div class="card-body p-0w-100 h-400px object-fit-cover rounded"
                                        style="background-repeat: no-repeat;background-size:  100% 100%;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/transformationsraum/office-3.webp') }}')">
                                </div>
                            </div>
                        </div>
                        <!--end::Image 3-->

                        <!--begin::Image 4-->
                        <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                <div class="card-body p-0w-100 h-400px object-fit-cover rounded"
                                        style="background-repeat: no-repeat;background-size:  100% 100%;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/transformationsraum/office-4.webp') }}')">
                                </div>
                            </div>
                        </div>
                        <!--end::Image 4-->
                        
                        
                    </div>
                    <!--end::Images Grid-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Office Images Section-->

    <!--begin::Features & Location Section-->
    <div class="mt-sm-n20 position-relative mt-20 pb-20">
        <div class="clouds-2"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Content-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Row-->
                    <div class="row g-10">
                        <!--begin::Col - Features & Specialities (Left)-->
                        <div class="col-xl-6 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                <div class="card-body pt-10">
                                    <h2 class="text-gray-900 mb-8 fw-boldest font-cinzel">Ausstattung & Besonderheiten</h2>
                                    
                                    <div class="mb-6">
                                        <!--begin::Feature 1-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-capsule fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Professionelle Behandlungsliege</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Ergonomisch gestaltete, bequeme Liege fur optimalen Komfort für dich.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Feature 1-->

                                        <!--begin::Feature 2-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-sun fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                        <span class="path6"></span>
                                                        <span class="path7"></span>
                                                        <span class="path8"></span>
                                                        <span class="path9"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Ambiente-Beleuchtung</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Warme Beleuchtung schafft eine entspannende Atmosphäre für deine Sitzung mit mir.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Feature 2-->

                                        <!--begin::Feature 3-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-spring-framework fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Natürliche Elemente</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Pflanzen, Kristalle und natürliche Materialien schaffen eine erdende Verbindung.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Feature 3-->

                                        <!--begin::Feature 4-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-abstract-23 fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Geschützter Raum</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Absolute Privatsphäre und Vertraulichkeit für deine persönliche Transformation.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Feature 4-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                        
                        <!--begin::Col - Location & Directions (Right)-->
                        <div class="col-xl-6 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                <div class="card-body pt-10">
                                    <h2 class="text-gray-900 mb-8 fw-boldest font-cinzel">Standort & Anfahrt</h2>
                                    
                                    <!--begin::Map-->
                                    <div class="mb-8">
                                        <div class="w-100 h-300px rounded"
                                            style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/transformationsraum/map.webp') }}')">
                                        </div>
                                    </div>
                                    <!--end::Map-->
                                    
                                    <div class="mb-6">
                                        <!--begin::Address-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-geolocation fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Adresse:</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Bucherstrasse 2<br>
                                                    9322 Egnach (TG)
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Address-->

                                        <!--begin::Parking-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-car fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Parkmöglichkeiten</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Kostenlose Parkplätze direkt vor dem Gebäude verfügbar.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Parking-->

                                        <!--begin::Public Transport-->
                                        <div class="d-flex align-items-start mb-6">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="w-50px h-50px rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-bus fs-2x text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-gray-900 mb-2 fw-bold">Öffentliche Verkehrsmittel</h4>
                                                <p class="fs-6 text-gray-600 mb-0">
                                                    Die Praxis ist 2 Minuten vom Bahnhof entfernt und zu Fuss gut erreichbar.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Public Transport-->
                                    </div>
                                </div>
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
    <!--end::Features & Location Section-->

</x-landing-layout> 