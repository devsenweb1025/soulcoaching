<!--begin::Table container-->
<div id="partnersTable">
    <div class="table-responsive">
        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="partners-table">
            <thead>
                <tr class="fw-bold text-muted">
                    <th class="min-w-50px">Bild</th>
                    <th class="min-w-150px">Name</th>
                    <th class="min-w-100px">Typ</th>
                    <th class="min-w-150px">Domain</th>
                    <th class="min-w-100px">Status</th>
                    <th class="min-w-100px text-end">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr data-id="{{ $partner->id }}">
                        <td>
                            <img src="{{ asset('storage/partners/' . $partner->image) }}"
                                alt="{{ $partner->name }}" class="h-50px rounded">
                        </td>
                        <td class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $partner->name }}</td>
                        <td class="text-dark fw-semibold text-hover-primary fs-6">{{ $partner->type }}</td>
                        <td>
                            <a href="{{ $partner->domain }}" target="_blank" class="text-dark fw-semibold text-hover-primary fs-6">
                                {{ $partner->domain }}
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-light-{{ $partner->is_active ? 'success' : 'danger' }} fw-bold fs-7 px-2 py-1">
                                {{ $partner->is_active ? 'Aktiv' : 'Inaktiv' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.partners.edit', $partner) }}"
                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-duotone ki-pencil fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <form action="{{ route('admin.partners.destroy', $partner) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Sind Sie sicher, dass Sie diesen Partner löschen möchten?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--end::Table container-->

@push('scripts')
<script>
    $(document).ready(function() {
        $('#partners-table').sortable({
            items: 'tr',
            cursor: 'move',
            axis: 'y',
            update: function(event, ui) {
                let items = [];
                $('tr[data-id]').each(function(index) {
                    items.push({
                        id: $(this).data('id'),
                        sort_order: index + 1
                    });
                });

                $.ajax({
                    url: '{{ route('admin.partners.update-order') }}',
                    method: 'POST',
                    data: {
                        items: items,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success('Reihenfolge erfolgreich aktualisiert');
                    },
                    error: function() {
                        toastr.error('Fehler beim Aktualisieren der Reihenfolge');
                    }
                });
            }
        });
    });
</script>
@endpush
