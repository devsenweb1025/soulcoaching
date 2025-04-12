<x-landing-layout>
    @include('pages.landing._partials._background')

    <!--begin::Orders Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="d-flex flex-column flex-center text-center py-10 py-lg-20 h-100 z-index-2 container">
                    <!--begin::Title-->
                    <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">My Orders
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        </span>
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Orders Table-->
                <div class="card shadow card-borderless mb-5">
                    <div class="card-body">
                        @if ($orders->isEmpty())
                            <div class="text-center py-10">
                                <div class="mb-5">
                                    <i class="ki-duotone ki-shopping-cart fs-4x text-gray-400">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </div>
                                <h3 class="text-gray-800 mb-2">No Orders Found</h3>
                                <p class="text-gray-500">You haven't placed any orders yet.</p>
                                <a href="{{ route('shop.index') }}" class="btn btn-primary">Start Shopping</a>
                            </div>
                        @else
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
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bold text-hover-primary fs-6">{{ $order->order_number }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-gray-600 fw-semibold">{{ $order->created_at->format('M d, Y') }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-gray-600 fw-semibold">{{ $order->items->count() }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bold">CHF
                                                        {{ number_format($order->total, 2) }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-light-{{ $order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'warning' : 'danger') }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-light-{{ (strtolower($order->payment_status) === 'completed' or strtolower($order->payment_status) === 'succeeded') ? 'success' : (strtolower($order->payment_status) === 'pending' ? 'warning' : 'danger') }}">
                                                        {{ ucfirst($order->payment_status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('account.orders.show', $order->id) }}"
                                                        class="btn btn-sm btn-light-primary">
                                                        View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!--begin::Pagination-->
                            <div class="d-flex flex-stack flex-wrap pt-10">
                                <div class="fs-6 fw-semibold text-gray-700">
                                    Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of
                                    {{ $orders->total() }} entries
                                </div>
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($orders->onFirstPage())
                                        <li class="page-item previous disabled">
                                            <a href="#" class="page-link">
                                                <i class="previous"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item previous">
                                            <a href="{{ $orders->previousPageUrl() }}" class="page-link">
                                                <i class="previous"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($orders->links()->elements as $element)
                                        {{-- "Three Dots" Separator --}}
                                        @if (is_string($element))
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link">{{ $element }}</a>
                                            </li>
                                        @endif

                                        {{-- Array Of Links --}}
                                        @if (is_array($element))
                                            @foreach ($element as $page => $url)
                                                @if ($page == $orders->currentPage())
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">{{ $page }}</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a href="{{ $url }}"
                                                            class="page-link">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($orders->hasMorePages())
                                        <li class="page-item next">
                                            <a href="{{ $orders->nextPageUrl() }}" class="page-link">
                                                <i class="next"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item next disabled">
                                            <a href="#" class="page-link">
                                                <i class="next"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!--end::Pagination-->
                        @endif
                    </div>
                </div>
                <!--end::Orders Table-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Orders Section-->
</x-landing-layout>
