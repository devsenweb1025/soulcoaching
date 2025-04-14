<x-base-layout>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Order Details #{{ $order->order_number }}</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-order-table-toolbar="base">
                    <!--begin::Status-->
                    <div class="me-3">
                        <span
                            class="badge badge-light-{{ $order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'primary' : ($order->status === 'cancelled' ? 'danger' : 'warning')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <!--end::Status-->
                    <!--begin::Actions-->
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light-primary me-3">
                        <i class="ki-duotone ki-arrow-left fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Back to Orders
                    </a>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Card-->
                    <div class="card mb-xl-8">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Order Items</span>
                            </h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table align-middle table-responsive table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-175px">Product</th>
                                            <th class="min-w-100px">Price</th>
                                            <th class="min-w-100px">Quantity</th>
                                            <th class="min-w-100px text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
                                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                                class="object-fit-contain" alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                                {{ $item->product->name }}
                                                            </a>
                                                            <span
                                                                class="text-muted fw-semibold text-muted d-block fs-7">
                                                                SKU: {{ $item->product->sku }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-semibold d-block mb-1">
                                                        CHF {{ number_format($item->price, 2, ',', '.') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-semibold d-block mb-1">
                                                        {{ $item->quantity }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-dark fw-bold d-block mb-1">
                                                        CHF
                                                        {{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card mb-xl-8">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Bestellübersicht</span>
                            </h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <tr>
                                            <td class="text-muted">Subtotal</td>
                                            <td class="text-end">CHF {{ number_format($order->subtotal, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Tax</td>
                                            <td class="text-end">CHF {{ number_format($order->tax, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Shipping</td>
                                            <td class="text-end">CHF {{ number_format($order->shipping, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Discount</td>
                                            <td class="text-end">CHF {{ number_format($order->discount, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr class="fw-bold fs-6">
                                            <td>Total</td>
                                            <td class="text-end">CHF {{ number_format($order->total, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card mb-xl-8">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Customer Information</span>
                            </h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <tr>
                                            <td class="text-muted">Name</td>
                                            <td class="text-end">{{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Email</td>
                                            <td class="text-end">{{ $order->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Phone</td>
                                            <td class="text-end">{{ $order->user->phone ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card mb-xl-8">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Shipping Information</span>
                            </h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <tr>
                                            <td class="text-muted">Address</td>
                                            <td class="text-end">{{ $order->shipping_address }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">City</td>
                                            <td class="text-end">{{ $order->shipping_city }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">State</td>
                                            <td class="text-end">{{ $order->shipping_state }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Postal Code</td>
                                            <td class="text-end">{{ $order->shipping_postal_code }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Country</td>
                                            <td class="text-end">{{ $order->shipping_country }}</td>
                                        </tr>
                                        @if ($order->tracking_number)
                                            <tr>
                                                <td class="text-muted">Tracking Number</td>
                                                <td class="text-end">
                                                    @if ($order->tracking_url)
                                                        <a href="{{ $order->tracking_url }}" target="_blank"
                                                            class="text-primary">
                                                            {{ $order->tracking_number }}
                                                        </a>
                                                    @else
                                                        {{ $order->tracking_number }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</x-base-layout>
