<x-base-layout>
    <!--begin::Tables widget 16-->
    <div class="card card-flush h-xl-100">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Orders Management</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6">Total {{ $orders->total() }} Orders</span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-12"
                        placeholder="Search orders..." />
                </div>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-6">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!--begin::Table container-->
            <div id="ordersTable">
                @include('pages.admin.orders.partials.table')
            </div>
            <!--end::Table container-->
        </div>
        <!--end: Card Body-->
    </div>
    <!--end::Tables widget 16-->

</x-base-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        let searchTimeout;

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                const searchValue = searchInput.value;

                fetch(`{{ route('admin.orders.index') }}?search=${searchValue}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('ordersTable').innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));
            }, 500); // 500ms delay
        });
    });
</script>
