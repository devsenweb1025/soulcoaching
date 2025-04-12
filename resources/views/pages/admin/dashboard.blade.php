<x-base-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!--begin::Icon-->
                    <div class="d-flex align-items-center mb-3">
                        <span class="symbol symbol-50px me-2">
                            <span class="symbol-label bg-light-primary">
                                <i class="ki-duotone ki-basket fs-2x text-primary">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 text-end">
                        <a href="{{ route('admin.products.index') }}"
                            class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $productCount }} Items
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
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!--begin::Icon-->
                    <div class="d-flex align-items-center mb-3">
                        <span class="symbol symbol-50px me-2">
                            <span class="symbol-label bg-light-success">
                                <i class="ki-duotone ki-teacher fs-2x text-success">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 text-end">
                        <a href="#" class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $courseCount }} Courses
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
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!--begin::Icon-->
                    <div class="d-flex align-items-center mb-3">
                        <span class="symbol symbol-50px me-2">
                            <span class="symbol-label bg-light-info">
                                <i class="ki-duotone ki-handcart fs-2x text-info">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 text-end">
                        <a href="#" class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $orderCount }} Orders
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
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!--begin::Icon-->
                    <div class="d-flex align-items-center mb-3">
                        <span class="symbol symbol-50px me-2">
                            <span class="symbol-label bg-light-warning">
                                <i class="ki-duotone ki-dollar fs-2x text-warning">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 text-end">
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
                                    {{ number_format($order->total, 2, ',', '.') }}
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
            <!--begin::Card widget 17-->
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">CHF</span>
                            <!--end::Currency-->
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($totalBenefits, 0, ',', '.') }}</span>
                            <!--end::Amount-->
                            <!--begin::Badge-->
                            <span class="badge badge-light-success fs-base">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                {{ $salesData->first()['total'] !== 0 ? number_format(($salesData->last()['total'] - $salesData->first()['total']) / $salesData->first()['total'] * 100, 1) : '0' }}%
                            </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Sales History (Last 30 Days)</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                    <!--begin::Chart-->
                    <div class="d-flex flex-center me-5 pt-2">
                        <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
                    </div>
                    <!--end::Chart-->
                    <!--begin::Labels-->
                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                        <!--begin::Label-->
                        <div class="d-flex fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Courses</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">CHF {{ number_format($salesData->sum('course'), 0, ',', '.') }}</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->
                        <!--begin::Label-->
                        <div class="d-flex fw-semibold align-items-center my-3">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Products</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">CHF {{ number_format($salesData->sum('product'), 0, ',', '.') }}</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->
                        <!--begin::Label-->
                        <div class="d-flex fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">CHF {{ number_format($salesData->sum('other'), 0, ',', '.') }}</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Labels-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 17-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-base-layout>

@push('scripts')
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
                height: 70,
                width: 70,
                sparkline: {
                    enabled: true
                },
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                categories: {!! json_encode(array_keys($salesData->toArray())) !!},
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                show: false
            },
            tooltip: {
                enabled: false
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

        var chart = new ApexCharts(document.querySelector("#kt_card_widget_17_chart"), options);
        chart.render();
    });
</script>
@endpush
