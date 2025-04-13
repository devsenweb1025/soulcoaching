<x-base-layout>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-order-table-filter="search"
                        class="form-control form-control-solid w-250px ps-12" placeholder="Search orders..." />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-order-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Filter
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-semibold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                    data-placeholder="Select option" data-allow-clear="true"
                                    data-kt-order-table-filter="status" data-hide-search="true">
                                    <option value="all">All Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset"
                                    class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                    data-kt-menu-dismiss="true" data-kt-order-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6"
                                    data-kt-menu-dismiss="true" data-kt-order-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_export_orders">
                        <i class="ki-duotone ki-exit-up fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Export
                    </button>
                    <!--end::Export-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_orders">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">Order #</th>
                            <th class="min-w-125px">Customer</th>
                            <th class="min-w-125px">Date</th>
                            <th class="min-w-125px">Amount</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Payment</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach ($orders as $order)
                            <tr>
                                <!--begin::Order=-->
                                <td>
                                    <a href="{{ route('admin.orders.show', $order) }}"
                                        class="text-dark text-hover-primary mb-1">
                                        #{{ $order->order_number }}
                                    </a>
                                </td>
                                <!--end::Order=-->
                                <!--begin::Customer=-->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                {{ $order->user->name }}
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">
                                                {{ $order->user->email }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <!--end::Customer=-->
                                <!--begin::Date=-->
                                <td>
                                    <span class="text-dark fw-semibold d-block mb-1">
                                        {{ $order->created_at->format('d.m.Y') }}
                                    </span>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">
                                        {{ $order->created_at->format('H:i') }}
                                    </span>
                                </td>
                                <!--end::Date=-->
                                <!--begin::Amount=-->
                                <td>
                                    <span class="text-dark fw-bold d-block mb-1">
                                        CHF {{ number_format($order->total, 2, ',', '.') }}
                                    </span>
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Status=-->
                                <td>
                                    <span
                                        class="badge badge-light-{{ $order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'primary' : ($order->status === 'cancelled' ? 'danger' : 'warning')) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <!--end::Status=-->
                                <!--begin::Payment=-->
                                <td>
                                    <span
                                        class="badge badge-light-{{ $order->payment_status === 'paid' ? 'success' : 'warning' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </td>
                                <!--end::Payment=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.orders.show', $order) }}"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-order-id="{{ $order->id }}" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_update_status">
                                                Update Status
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-order-id="{{ $order->id }}" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_update_tracking">
                                                Update Tracking
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-order-id="{{ $order->id }}" data-kt-action="delete">
                                                Delete
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer">
            {{ $orders->links('vendor.pagination.metronic') }}
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Card-->

    <!--begin::Modals-->
    <!--begin::Modal - Update Status-->
    <div class="modal fade" id="kt_modal_update_status" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form id="kt_modal_update_status_form" class="form" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <h2>Update Order Status</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Status</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="status" class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select status">
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">Notes</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="notes" class="form-control form-control-solid" rows="3"></textarea>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal - Update Status-->

    <!--begin::Modal - Update Tracking-->
    <div class="modal fade" id="kt_modal_update_tracking" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form id="kt_modal_update_tracking_form" class="form" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <h2>Update Tracking Information</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Tracking Number</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="tracking_number" class="form-control form-control-solid"
                                    placeholder="Enter tracking number" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">Tracking URL</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="url" name="tracking_url" class="form-control form-control-solid"
                                    placeholder="Enter tracking URL" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal - Update Tracking-->

    <!--begin::Modal - Export Orders-->
    <div class="modal fade" id="kt_modal_export_orders" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form id="kt_modal_export_orders_form" class="form" action="#" method="POST">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <h2>Export Orders</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Date Range</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="row">
                                    <div class="col-6">
                                        <input type="date" name="start_date"
                                            class="form-control form-control-solid" />
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="end_date"
                                            class="form-control form-control-solid" />
                                    </div>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Export</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal - Export Orders-->
    <!--end::Modals-->
</x-base-layout>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize DataTable
            const table = document.querySelector('#kt_table_orders');
            if (table) {
                const datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                    'columnDefs': [{
                            orderable: false,
                            targets: 6
                        } // Disable ordering on actions column
                    ]
                });

                // Handle search
                const searchInput = document.querySelector('[data-kt-order-table-filter="search"]');
                if (searchInput) {
                    searchInput.addEventListener('keyup', function() {
                        datatable.search(this.value).draw();
                    });
                }

                // Handle status filter
                const statusFilter = document.querySelector('[data-kt-order-table-filter="status"]');
                if (statusFilter) {
                    statusFilter.addEventListener('change', function() {
                        const value = this.value;
                        if (value === 'all') {
                            datatable.column(4).search('').draw();
                        } else {
                            datatable.column(4).search(value).draw();
                        }
                    });
                }
            }

            // Handle status update form
            const statusForm = document.querySelector('#kt_modal_update_status_form');
            if (statusForm) {
                statusForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const orderId = this.getAttribute('data-kt-order-id');
                    const formData = new FormData(this);

                    fetch(`/admin/orders/${orderId}/status`, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    text: "Order status updated successfully!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                });
            }

            // Handle tracking update form
            const trackingForm = document.querySelector('#kt_modal_update_tracking_form');
            if (trackingForm) {
                trackingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const orderId = this.getAttribute('data-kt-order-id');
                    const formData = new FormData(this);

                    fetch(`/admin/orders/${orderId}/tracking`, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    text: "Tracking information updated successfully!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                });
            }

            // Handle delete action
            const deleteButtons = document.querySelectorAll('[data-kt-action="delete"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const orderId = this.closest('tr').getAttribute('data-kt-order-id');

                    Swal.fire({
                        text: "Are you sure you want to delete this order?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(result => {
                        if (result.isConfirmed) {
                            fetch(`/admin/orders/${orderId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').content
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            text: "Order deleted successfully!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(() => {
                                            location.reload();
                                        });
                                    }
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
