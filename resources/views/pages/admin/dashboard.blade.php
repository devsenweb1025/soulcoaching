<x-base-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1">
                        <a href="{{ route('admin.products.index') }}"
                            class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $productCount }}
                        </a>
                        <span class="text-muted fw-semibold">Total Products</span>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1">
                        <a href="#" class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $courseCount }}
                        </a>
                        <span class="text-muted fw-semibold">Total Courses</span>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1">
                        <a href="#" class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $orderCount }}
                        </a>
                        <span class="text-muted fw-semibold">Total Orders</span>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1">
                        <span class="text-dark fs-2 fw-bold mb-1">
                            CHF {{ number_format($totalBenefits, 2, ',', '.') }}
                        </span>
                        <span class="text-muted fw-semibold">Total Benefits</span>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Chart Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Sales History</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <div id="sales_chart" style="height: 350px;"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart Widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Recent Orders</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    @foreach ($recentOrders as $order)
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
                                <a href="#" class="text-dark text-hover-primary fs-6 fw-bold">
                                    Order #{{ $order->order_number }}
                                </a>
                                <span class="text-muted fw-semibold">
                                    {{ $order->user->name }} - CHF
                                    {{ number_format($order->total_amount, 2, ',', '.') }}
                                </span>
                            </div>
                            <!--end::Text-->
                        </div>
                    @endforeach
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Recent Chat Messages</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    @foreach ($recentChats as $chat)
                        <div class="d-flex align-items-center mb-7">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-light-info">
                                    <i class="ki-duotone ki-message-text-2 fs-2x text-info">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                                <span class="text-dark text-hover-primary fs-6 fw-bold">
                                    {{ $chat->user->name }}
                                </span>
                                <span class="text-muted fw-semibold">
                                    {{ Str::limit($chat->message, 50) }}
                                </span>
                            </div>
                            <!--end::Text-->
                        </div>
                    @endforeach
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Recent Bookings</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    @foreach ($recentBookings as $booking)
                        <div class="d-flex align-items-center mb-7">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-light-success">
                                    <i class="ki-duotone ki-calendar fs-2x text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark text-hover-primary fs-6 fw-bold">
                                    Booking #{{ $booking->id }}
                                </a>
                                <span class="text-muted fw-semibold">
                                    {{ $booking->user->name }} - {{ $booking->user->created_at->format('d.m.Y H:i') }}
                                </span>
                            </div>
                            <!--end::Text-->
                        </div>
                    @endforeach
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-base-layout>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sales Chart
        var options = {
            series: [{
                name: 'Sales',
                data: {!! json_encode(array_values($salesData->toArray())) !!}
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: {!! json_encode(array_keys($salesData->toArray())) !!},
                labels: {
                    style: {
                        colors: '#a1a5b7'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#a1a5b7'
                    },
                    formatter: function(value) {
                        return 'CHF ' + value.toFixed(2);
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return 'CHF ' + value.toFixed(2);
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.3,
                    stops: [0, 90, 100]
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#sales_chart"), options);
        chart.render();
    });
</script>
