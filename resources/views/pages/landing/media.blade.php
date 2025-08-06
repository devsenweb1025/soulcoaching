<x-landing-layout>
    @section('title', 'Medien und Partnerschaften – Seelenfluesterin')
    @section('description', 'Einblicke in Beiträge, Interviews und Kooperationen – erfahre mehr über die Wirkung der Seelenfluesterin & ihr Netzwerk.')
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
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Medien & partner
                    <span
                        style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    </span>
                </h1>
                <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                    In der heutigen Zeit ist es wichtiger denn je, echte Verbindungen zu schaffen – auch im digitalen Raum.
                    <br /><br />
                    Als spirituelle Begleiterin, Tierkommunikatorin und Expertin für energetisches Heilen freue ich mich
                    über Kooperationen mit Medien, Blogs, Plattformen oder Partnern, die ähnliche Werte teilen.
                    <br /><br />
                    Es freut mich, dass ich mit den untenstehenden Unternehmen eine Kooperation eingehen durfte, damit du
                    bei mir günstiger einkaufen kannst und wir gemeinsam Unternehmen unterstützen, die die Vision einer
                    positiven Welt teilen.
                </p>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Landing hero-->

        <!--begin::Media Section-->
        <div class="mt-20 mb-20 position-relative">
            <div class="clouds-2"></div>
            <!--begin::Container-->
            <div class="container position-relative z-index-2">
                <div class="card bg-transparent" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                    data-aos-delay="0">
                    <div class="card-body">
                        <!--begin::Partner Cards-->
                        <div class="row mt-15">
                            @foreach ($partners as $id => $partner)
                                <div class="col-lg-12 mt-10" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="0">
                                    <div class="card shadow h-100">
                                        <div class="card-body position-relative">
                                            <div class="position-absolute top-10 left-10 text-gray-600 fs-4 mb-10">
                                                {{ $partner['name'] }}
                                            </div>
                                            <div class="text-center mb-10">
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="height: 80px;">
                                                    <img src="{{ asset('storage/partners/' . $partner->image) }}"
                                                        alt="{{ $partner['name'] }}" class="img-fluid"
                                                        style="max-height: 80px; width: auto;">
                                                </div>
                                            </div>
                                            <div class="text-gray-600 fs-4 mb-10">
                                                {{ $partner['description'] }}
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ $partner['domain'] }}"
                                                    class="text-primary text-hover-primary fs-5 fw-bold" target="_blank">
                                                    {{ $partner['domain'] }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Partner Cards-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Media Section-->
    </x-landing-layout>
