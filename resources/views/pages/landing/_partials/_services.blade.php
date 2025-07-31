<div class="position-relative">
    <div class="clouds-1"></div>
    <!--begin::Services Section-->
    <div class="mt-20 z-index-1 container position-relative">

        <!--begin::Curve top-->
        <div class="landing-curve landing-light-color opacity-1">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-light-bg rounded">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Dienstleistungen</h1>
                        <div class="text-gray-600 fw-semibold fs-5">
                            Entdecke meine Dienstleistungen.
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        @foreach ($services as $service)
                            <div class="col-lg-3" id="card-container" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500" data-aos-delay="0">
                                <div class="card card-shadow shadow card-borderless mb-5 bg-white">
                                    <!--begin::Service Image-->

                                    <!--end::Service Image-->
                                    <div class="card-header ribbon ribbon-top ribbon-inner">
                                        <h2 class="card-title pt-5 fw-bold fs-md-7 fs-4">
                                            {{ $service['title'] }}
                                        </h2>
                                        @if (!empty($service['is_featured']))
                                            <div class="ribbon-label bg-danger">Meist gebucht</div>
                                        @endif
                                    </div>
                                    <div class="card-body pt-1">
                                        @if (!empty($service['image']))
                                            <div class="w-100 h-200px object-fit-cover rounded-top"
                                                style="background-image: url('{{ asset('storage/' . $service['image']) }}'); background-size: contain; background-position: center;">
                                            </div>
                                        @endif
                                        @if (!empty($service['features']))
                                            <div>
                                                <span class="fs-4 fw-bold text-primary">Vorteile:</span>
                                                <div class="mt-4">
                                                    @foreach ($service['features'] as $feature)
                                                        <div class="d-flex flex-stack mb-2">
                                                            <span
                                                                class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                            <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
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
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-light-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Services Section-->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('#card-container .card');
        let maxHeight = 0;

        // Set initial equal heights
        cards.forEach(card => {
            maxHeight = Math.max(maxHeight, card.offsetHeight);
        });

        cards.forEach(card => {
            card.style.height = `${maxHeight}px`;
        });

    });
</script>
