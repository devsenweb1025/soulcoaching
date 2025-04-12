<x-landing-layout>
    @include('pages.landing._partials._background')

    <!--begin::Success Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Heading-->
                <div class="d-flex flex-column flex-center text-center py-10 py-lg-20 h-100 z-index-2 container">
                    <!--begin::Title-->
                    <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Payment Successful
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        </span>
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow card-borderless">
                            <div class="card-body text-center p-10">
                                <!--begin::Icon-->
                                <div class="mb-10">
                                    <i class="ki-duotone ki-check-circle fs-2hx text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Message-->
                                <div class="mb-10">
                                    <h2 class="text-dark mb-5">Thank You for Your Order!</h2>
                                    <div class="text-muted fw-semibold fs-5">
                                        {{ session('message') }}
                                    </div>
                                </div>
                                <!--end::Message-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('shop.index') }}" class="btn btn-primary me-3">Continue Shopping</a>
                                    <a href="{{ route('account.orders') }}" class="btn btn-light">View Orders</a>
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
    <!--end::Success Section-->
</x-landing-layout>
