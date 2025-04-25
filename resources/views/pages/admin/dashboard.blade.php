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
                                </i>
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 text-end">
                        <a href="{{ route('admin.products.index') }}"
                            class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $productCount }} Produkte
                        </a>
                        <span class="text-muted fw-semibold">Gesamte Produkte</span>
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
                        <span class="text-dark fs-2 fw-bold mb-1">
                            {{ $courseCount }} Kurse
                        </span>
                        <span class="text-muted fw-semibold">Gesamte Kurse</span>
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
                                </i>
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 text-end">
                        <a href="{{ route('admin.orders.index') }}"
                            class="text-dark text-hover-primary fs-2 fw-bold mb-1">
                            {{ $orderCount }} Bestellungen
                        </a>
                        <span class="text-muted fw-semibold">Gesamte Bestellungen</span>
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
                            @chf($totalBenefits)
                        </span>
                        <span class="text-muted fw-semibold">Gesamter Umsatz</span>
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
                        <span class="card-label fw-bold fs-3 mb-1">Letzte Bestellungen</span>
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
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="text-dark text-hover-primary fs-6 fw-bold">
                                    Bestellung #{{ $order->order_number }}
                                </a>
                                <span class="text-muted fw-semibold">
                                    {{ $order->user->name }} - @chf($order->total)
                                </span>
                            </div>
                            <!--end::Text-->
                        </div>
                    @endforeach
                    <div class="text-end mt-5">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-light-primary">
                            Alle Bestellungen anzeigen
                        </a>
                    </div>
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
                        <span class="card-label fw-bold fs-3 mb-1">Buchungskalender</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <div id="dashboardCalendar"></div>
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
                            <span
                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($totalBenefits, 0, ',', '.') }}</span>
                            <!--end::Amount-->
                            <!--begin::Badge-->
                            <span class="badge badge-light-success fs-base">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                            rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                {{ $salesData->first()['total'] !== 0 ? number_format((($salesData->last()['total'] - $salesData->first()['total']) / $salesData->first()['total']) * 100, 1) : '0' }}%
                            </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Umsatzverlauf (Letzte 30 Tage)</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                    <!--begin::Chart-->
                    <div class="d-flex flex-center me-5 pt-2">
                        <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                            data-kt-line="11"></div>
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
                            <div class="text-gray-500 flex-grow-1 me-4">Kurse</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">@chf($salesData->sum('course'))</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->
                        <!--begin::Label-->
                        <div class="d-flex fw-semibold align-items-center my-3">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Produkte</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">@chf($salesData->sum('product'))</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->
                        <!--begin::Label-->
                        <div class="d-flex fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Sonstiges</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">@chf($salesData->sum('other'))</div>
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

        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Meistverkaufte Produkte</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    @foreach ($topProducts as $product)
                        <div class="d-flex align-items-center mb-7">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-light-primary">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }}"
                                        class="h-75 align-self-end" alt="{{ $product->name }}" />
                                </span>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                                <a href="{{ route('admin.products.show', $product) }}"
                                    class="text-dark text-hover-primary fs-6 fw-bold">
                                    {{ $product->name }}
                                </a>
                                <span class="text-muted fw-semibold">
                                    {{ $product->sales_count }} Verkäufe - @chf($product->total_revenue)
                                </span>
                            </div>
                            <!--end::Text-->
                        </div>
                    @endforeach
                    <div class="text-end mt-5">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light-primary">
                            Alle Produkte anzeigen
                        </a>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-base-layout>

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
<style>
    .fc-event {
        cursor: pointer;
    }
    #dashboardCalendar {
        height: 400px;
    }
</style>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
<script>
    $(document).ready(function() {
        // Initialize FullCalendar
        var calendarEl = document.getElementById('dashboardCalendar');
        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: {
                    url: '{{ route('admin.bookings.events') }}',
                    method: 'GET',
                    success: function(response) {
                        return response.collection.map(function(event) {
                            return {
                                id: event.uri,
                                title: event.name || 'Meeting',
                                start: event.start_time,
                                end: event.end_time,
                                backgroundColor: getEventColor(event.status),
                                extendedProps: {
                                    eventType: event.event_type,
                                    status: event.status,
                                    location: event.location,
                                    timezone: event.timezone,
                                    uri: event.uri
                                }
                            };
                        });
                    }
                },
                eventClick: function(info) {
                    fetch(`/admin/bookings/invitees?eventUri=${info.event.extendedProps.uri}`)
                        .then(response => response.json())
                        .then(data => {
                            const event = info.event;
                            const props = event.extendedProps;

                            // Create modal content
                            let modalContent = `
                                <div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="ki-duotone ki-calendar-check fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    ${event.title}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card mb-4">
                                                            <div class="card-header">
                                                                <h6 class="card-title mb-0">Event Information</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <i class="ki-duotone ki-calendar-event fs-2 me-2 text-primary">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <div>
                                                                        <small class="text-muted">Event Type</small>
                                                                        <p class="mb-0">${props.eventType || 'N/A'}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <i class="ki-duotone ki-clock fs-2 me-2 text-primary">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <div>
                                                                        <small class="text-muted">Start Time</small>
                                                                        <p class="mb-0">${event.start.toLocaleString()}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <i class="ki-duotone ki-clock-fill fs-2 me-2 text-primary">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <div>
                                                                        <small class="text-muted">End Time</small>
                                                                        <p class="mb-0">${event.end.toLocaleString()}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <i class="ki-duotone ki-globe fs-2 me-2 text-primary">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <div>
                                                                        <small class="text-muted">Timezone</small>
                                                                        <p class="mb-0">${data.collection?.[0]?.timezone || 'N/A'}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="ki-duotone ki-geo-alt fs-2 me-2 text-primary">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <div>
                                                                        <small class="text-muted">Location</small>
                                                                        <p class="mb-0">${props.location?.location || 'N/A'}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card mb-4">
                                                            <div class="card-header">
                                                                <h6 class="card-title mb-0">Invitees</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div id="inviteesList" class="list-group list-group-flush">
                                                                    ${data.collection && data.collection.length > 0 ?
                                                                        data.collection.map(invitee => `
                                                                            <div class="list-group-item">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="flex-shrink-0">
                                                                                        <i class="ki-duotone ki-user-circle fs-2 text-primary">
                                                                                            <span class="path1"></span>
                                                                                            <span class="path2"></span>
                                                                                        </i>
                                                                                    </div>
                                                                                    <div class="flex-grow-1 ms-3">
                                                                                        <h6 class="mb-1">${invitee.name || 'N/A'}</h6>
                                                                                        <p class="mb-0 text-muted small">${invitee.email || 'N/A'}</p>
                                                                                    </div>
                                                                                    <div class="flex-shrink-0">
                                                                                        <span class="badge badge-light-${invitee.status === 'active' ? 'success' : 'danger'}">
                                                                                            ${invitee.status}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        `).join('') :
                                                                        '<div class="list-group-item text-center text-muted">No invitees found</div>'
                                                                    }
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                ${props.location?.join_url ? `
                                                    <a href="${props.location.join_url}" class="btn btn-primary" target="_blank">
                                                        <i class="ki-duotone ki-camera-video fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        Join Meeting
                                                    </a>
                                                ` : ''}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            // Remove existing modal if any
                            $('#eventModal').remove();

                            // Add new modal to body
                            $('body').append(modalContent);

                            // Show modal
                            $('#eventModal').modal('show');
                        });
                },
                eventDidMount: function(info) {
                    $(info.el).tooltip({
                        title: `${info.event.title}\nStatus: ${info.event.extendedProps.status}`,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                }
            });
            calendar.render();
        }

        // Sales Chart
        var options = {
            series: [{
                name: 'Umsatz',
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

    function getEventColor(status) {
        switch (status) {
            case 'active':
                return '#28a745'; // Green
            case 'canceled':
                return '#dc3545'; // Red
            default:
                return '#6c757d'; // Gray
        }
    }
</script>