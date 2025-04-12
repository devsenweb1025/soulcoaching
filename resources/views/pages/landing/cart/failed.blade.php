<x-landing-layout>
    @include('pages.landing._partials._background')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-350px px-9">
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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Payment Failed
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Failed Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow card-borderless">
                            <div class="card-body text-center p-10">
                                <!--begin::Icon-->
                                <div class="mb-10">
                                    <i class="ki-duotone ki-cross-circle fs-2hx text-danger">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Message-->
                                <div class="mb-10">
                                    <h2 class="text-dark mb-5">Payment Failed</h2>
                                    <div class="text-muted fw-semibold fs-5">
                                        {{ session('message') }}
                                    </div>
                                </div>
                                <!--end::Message-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('cart.checkout') }}" class="btn btn-primary me-3">Try Again</a>
                                    <a href="{{ route('shop') }}" class="btn btn-light">Continue Shopping</a>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Failed Section-->
</x-landing-layout>
