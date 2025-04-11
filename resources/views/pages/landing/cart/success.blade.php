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
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Order Confirmed
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Success Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <div class="card shadow card-borderless mb-5">
                    <div class="card-body">
                        <!--begin::Alert-->
                        <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                            <i class="ki-duotone ki-check-circle fs-2hx text-success me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-dark">Thank you for your order!</h4>
                                <span>Your order has been received and is being processed. A confirmation email has been sent to your email address.</span>
                            </div>
                        </div>
                        <!--end::Alert-->

                        <!--begin::Order Details-->
                        <div class="mb-10">
                            <h3 class="mb-5">Order Details</h3>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                    <tbody>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Order Number</td>
                                            <td class="text-gray-800">{{ $order['id'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Order Date</td>
                                            <td class="text-gray-800">{{ now()->format('F j, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Total Amount</td>
                                            <td class="text-gray-800">CHF {{ number_format($order['total'], 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Order Details-->

                        <!--begin::Shipping Details-->
                        <div class="mb-10">
                            <h3 class="mb-5">Shipping Details</h3>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                    <tbody>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Name</td>
                                            <td class="text-gray-800">{{ $order['shipping']['first_name'] }} {{ $order['shipping']['last_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Email</td>
                                            <td class="text-gray-800">{{ $order['shipping']['email'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Phone</td>
                                            <td class="text-gray-800">{{ $order['shipping']['phone'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-800 fw-bold">Address</td>
                                            <td class="text-gray-800">
                                                {{ $order['shipping']['address'] }}<br>
                                                {{ $order['shipping']['postal_code'] }} {{ $order['shipping']['city'] }}<br>
                                                {{ $order['shipping']['country'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Shipping Details-->

                        <!--begin::Order Items-->
                        <div class="mb-10">
                            <h3 class="mb-5">Order Items</h3>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                    <thead>
                                        <tr class="fw-bold text-muted bg-light">
                                            <th class="min-w-150px">Product</th>
                                            <th class="min-w-100px">Quantity</th>
                                            <th class="min-w-100px">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order['items'] as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
                                                            <img src="{{ $item->options->image }}" class="" alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span class="text-dark fw-bold text-hover-primary fs-6">{{ $item->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->qty }}</td>
                                                <td>CHF {{ number_format($item->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Order Items-->

                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Success Section-->
</x-landing-layout>
