<x-base-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Card-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Product Image-->
                    <div class="text-center mb-10">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }}"
                             class="mw-100 h-200px" alt="{{ $product->name }}" />
                    </div>
                    <!--end::Product Image-->

                    <!--begin::Product Details-->
                    <div class="mb-10">
                        <h3 class="fs-2 fw-bold mb-3">{{ $product->name }}</h3>
                        <div class="fs-6 text-gray-600 mb-3">
                            <span class="fw-bold">SKU:</span> {{ $product->sku ?? 'N/A' }}
                        </div>
                        <div class="fs-6 text-gray-600 mb-3">
                            <span class="fw-bold">Barcode:</span> {{ $product->barcode ?? 'N/A' }}
                        </div>
                        <div class="fs-6 text-gray-600 mb-3">
                            <span class="fw-bold">Preis:</span> CHF {{ number_format($product->price, 2, ',', '.') }}
                        </div>
                        @if($product->compare_price)
                            <div class="fs-6 text-gray-600 mb-3">
                                <span class="fw-bold">Vergleichspreis:</span> CHF {{ number_format($product->compare_price, 2, ',', '.') }}
                            </div>
                        @endif
                        <div class="fs-6 text-gray-600 mb-3">
                            <span class="fw-bold">Lagerbestand:</span> {{ $product->quantity }}
                        </div>
                        <div class="fs-6 text-gray-600 mb-3">
                            <span class="fw-bold">Status:</span>
                            <span class="badge badge-light-{{ $product->is_active ? 'success' : 'danger' }}">
                                {{ $product->is_active ? 'Aktiv' : 'Inaktiv' }}
                            </span>
                        </div>
                        @if($product->is_featured)
                            <div class="fs-6 text-gray-600 mb-3">
                                <span class="badge badge-light-primary">Hervorgehoben</span>
                            </div>
                        @endif
                    </div>
                    <!--end::Product Details-->

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-light-primary">
                            <i class="ki-duotone ki-pencil fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Bearbeiten
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light">
                            <i class="ki-duotone ki-arrow-left fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Zurück
                        </a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Card-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <h3 class="fs-2 fw-bold mb-5">Verkaufsstatistik</h3>
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-5">
                                    <div class="symbol symbol-50px me-5">
                                        <span class="symbol-label bg-light-primary">
                                            <i class="ki-duotone ki-handcart fs-2x text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-gray-600 fs-6">Gesamtverkäufe</span>
                                        <span class="text-dark fs-2 fw-bold">{{ $totalSales }}</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
                                        <span class="symbol-label bg-light-success">
                                            <i class="ki-duotone ki-dollar fs-2x text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-gray-600 fs-6">Gesamtumsatz</span>
                                        <span class="text-dark fs-2 fw-bold">CHF {{ number_format($totalRevenue, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Card-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <h3 class="fs-2 fw-bold mb-5">Produktbeschreibung</h3>
                            <div class="text-gray-600 fs-6">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Card-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Letzte Verkäufe</span>
                    </h3>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    @foreach($recentOrders as $orderItem)
                        <div class="d-flex align-items-center mb-7">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-light-primary">
                                    <i class="ki-duotone ki-user fs-2x text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                                <a href="{{ route('admin.orders.show', $orderItem->order_id) }}" class="text-dark text-hover-primary fs-6 fw-bold">
                                    Bestellung #{{ $orderItem->order->order_number }}
                                </a>
                                <span class="text-muted fw-semibold">
                                    {{ $orderItem->order->user->name }} - {{ $orderItem->quantity }} Stück - CHF {{ number_format($orderItem->price * $orderItem->quantity, 2, ',', '.') }}
                                </span>
                            </div>
                            <!--end::Text-->
                        </div>
                    @endforeach
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-base-layout>
