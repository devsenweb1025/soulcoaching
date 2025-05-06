<x-base-layout>
    <x-slot name="title">Benutzer</x-slot>

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
                    <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-12" placeholder="Benutzer suchen..." />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="ki-duotone ki-plus fs-2"></i>Benutzer hinzufügen
                    </a>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!--begin::Table container-->
            <div id="usersTable" class="table-responsive">
                @include('pages.admin.users.partials.table')
            </div>
            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</x-base-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        let searchTimeout;

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                const searchValue = searchInput.value;

                fetch(`{{ route('admin.users.index') }}?search=${searchValue}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('usersTable').innerHTML = html;
                        // Reattach event listeners after table update
                        attachEventListeners();
                    })
                    .catch(error => console.error('Fehler:', error));
            }, 500); // 500ms delay
        });

        // Function to attach event listeners
        function attachEventListeners() {
            // Delete user
            $('.delete-user').on('click', function() {
                const userId = $(this).data('user-id');

                Swal.fire({
                    text: "Sind Sie sicher, dass Sie diesen Benutzer löschen möchten?",
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
                            url: `{{ route('admin.users.destroy', ['user' => ':userId']) }}`.replace(':userId', userId),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            success: function(response) {
                                Swal.fire({
                                    text: "Benutzer wurde erfolgreich gelöscht!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function() {
                                    window.location.reload();
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

            // Toggle verification
            $('.toggle-verification').on('change', function() {
                const userId = $(this).data('user-id');
                const isVerified = $(this).is(':checked');

                $.ajax({
                    url: `{{ route('admin.users.toggle-verification', ['user' => ':userId']) }}`.replace(':userId', userId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        verified: isVerified
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error('Ein Fehler ist aufgetreten');
                        $(this).prop('checked', !isVerified);
                    }
                });
            });
        }

        // Initial attachment of event listeners
        attachEventListeners();
    });
</script>
