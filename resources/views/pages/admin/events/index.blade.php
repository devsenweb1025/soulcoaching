<x-base-layout>
    <!--begin::Tables widget 16-->
    <div class="card card-flush h-xl-100">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Events verwalten</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6">Insgesamt {{ $events->total() }} Events</span>
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
                    <input type="text" id="search" class="form-control form-control-solid w-250px ps-12"
                        placeholder="Events durchsuchen..." />
                </div>
                <!--end::Search-->
                <select id="status-filter" class="form-select form-select-solid w-150px ms-3">
                    <option value="all">Alle Status</option>
                    <option value="active">Aktiv</option>
                    <option value="inactive">Inaktiv</option>
                </select>
                <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-light-primary ms-3">
                    <i class="ki-duotone ki-plus fs-2"></i>Neues Event hinzufügen
                </a>
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
            <div id="events-table">
                @include('pages.admin.events.partials.table')
            </div>
            <!--end::Table container-->
        </div>
        <!--end: Card Body-->
    </div>
    <!--end::Tables widget 16-->

</x-base-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const statusFilter = document.getElementById('status-filter');
        let searchTimeout;

        function loadEvents() {
            const search = searchInput.value;
            const status = statusFilter.value;
            
            fetch(`{{ route('admin.events.index') }}?search=${search}&status=${status}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById('events-table').innerHTML = html;
                // Reattach event listeners after table update
                attachEventListeners();
            })
            .catch(error => console.error('Fehler:', error));
        }

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(loadEvents, 500);
        });

        statusFilter.addEventListener('change', loadEvents);

        // Toggle active status
        $('.toggle-active').on('change', function() {
            const checkbox = $(this);
            const eventId = checkbox.data('event-id');
            const isActive = checkbox.is(':checked');

            $.ajax({
                url: `/admin/events/${eventId}/aktivieren`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        // Revert checkbox if failed
                        checkbox.prop('checked', !isActive);
                    }
                },
                error: function(xhr) {
                    toastr.error('Ein Fehler ist aufgetreten');
                    // Revert checkbox on error
                    checkbox.prop('checked', !isActive);
                }
            });
        });

        // Function to attach event listeners
        function attachEventListeners() {
            // Delete event
            $('.delete-event').on('click', function() {
                const eventId = $(this).data('event-id');

                Swal.fire({
                    text: "Sind Sie sicher, dass Sie dieses Event löschen möchten?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ja, löschen!",
                    cancelButtonText: "Nein, abbrechen",
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/events/${eventId}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            success: function(response) {
                                Swal.fire({
                                    text: "Event wurde erfolgreich gelöscht!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function() {
                                    // Reload the table
                                    loadEvents();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    text: "Ein Fehler ist aufgetreten!",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    }
                });
            });

            // Toggle active status
            $('.toggle-active').on('change', function() {
                const checkbox = $(this);
                const eventId = checkbox.data('event-id');
                const isActive = checkbox.is(':checked');

                $.ajax({
                    url: `/admin/events/${eventId}/aktivieren`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                        } else {
                            // Revert checkbox if failed
                            checkbox.prop('checked', !isActive);
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Ein Fehler ist aufgetreten');
                        // Revert checkbox on error
                        checkbox.prop('checked', !isActive);
                    }
                });
            });
        }

        // Initial attachment of event listeners
        attachEventListeners();
    });
</script>
