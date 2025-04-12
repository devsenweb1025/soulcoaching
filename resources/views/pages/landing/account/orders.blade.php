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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">My Orders
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Orders Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                @if($orders->isEmpty())
                    <div class="card shadow card-borderless">
                        <div class="card-body text-center p-10">
                            <div class="mb-10">
                                <i class="ki-duotone ki-shopping-cart fs-2hx text-muted">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <h2 class="text-dark mb-5">No Orders Found</h2>
                            <div class="text-muted fw-semibold fs-5 mb-10">
                                You haven't placed any orders yet. Start shopping to see your orders here.
                            </div>
                            <a href="{{ route('shop.index') }}" class="btn btn-primary">Start Shopping</a>
                        </div>
                    </div>
                @else
                    <div class="card shadow card-borderless">
                        <div class="card-body p-10">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                    <thead>
                                        <tr class="fw-bold text-muted bg-light">
                                            <th class="min-w-150px">Order Number</th>
                                            <th class="min-w-100px">Date</th>
                                            <th class="min-w-100px">Items</th>
                                            <th class="min-w-100px">Total</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-100px">Payment Status</th>
                                            <th class="min-w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    <span class="text-dark fw-bold text-hover-primary fs-6">{{ $order->order_number }}</span>
                                                </td>
                                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                                <td>{{ $order->items->sum('quantity') }}</td>
                                                <td>CHF {{ number_format($order->total, 2) }}</td>
                                                <td>
                                                    <span class="badge badge-light-{{ $order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'warning' : 'danger') }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-{{ $order->payment_status === 'succeeded' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($order->payment_status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('account.orders.show', $order) }}" class="btn btn-sm btn-light-primary">
                                                        View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-10">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Orders Section-->
</x-landing-layout>
