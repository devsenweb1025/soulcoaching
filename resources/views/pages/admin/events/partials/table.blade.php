<div class="table-responsive">
    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
        <thead>
            <tr class="fw-bold text-muted">
                <th class="w-25px">
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                    </div>
                </th>
                <th class="min-w-150px">Event</th>
                <th class="min-w-140px">Datum & Zeit</th>
                <th class="min-w-120px">Kategorie</th>
                <th class="min-w-100px">Status</th>
                <th class="min-w-100px">Sortierung</th>
                <th class="text-end min-w-100px">Aktionen</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input widget-9-check" type="checkbox" value="{{ $event->id }}" />
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="d-flex justify-content-start flex-column">
                            <a href="{{ route('admin.events.show', $event) }}" class="text-dark fw-bold text-hover-primary fs-6">
                                {{ $event->title }}
                            </a>
                            @if($event->description)
                            <span class="text-muted fw-semibold d-block fs-7">
                                {{ Str::limit($event->description, 50) }}
                            </span>
                            @endif
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column">
                        <span class="text-dark fw-bold fs-7">{{ $event->formatted_date }}</span>
                        <span class="text-muted fw-semibold fs-7">{{ $event->formatted_time }}</span>
                    </div>
                </td>
                <td>
                    <span class="badge badge-light-{{ $event->category_color === 'bg-primary' ? 'primary' : ($event->category_color === 'bg-success' ? 'success' : ($event->category_color === 'bg-info' ? 'info' : 'warning')) }}">
                        {{ $event->category }}
                    </span>
                </td>
                <td>
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input toggle-active" type="checkbox"
                            data-event-id="{{ $event->id }}"
                            {{ $event->is_active ? 'checked' : '' }} />
                    </div>
                </td>
                <td>
                    <span class="text-dark fw-bold fs-7">{{ $event->sort_order }}</span>
                </td>
                <td class="text-end">
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-pencil fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-event" data-event-id="{{ $event->id }}">
                        <i class="ki-duotone ki-trash fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted py-5">
                    <div class="d-flex flex-column align-items-center">
                        <i class="ki-duotone ki-calendar fs-3x text-muted mb-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="fs-6 fw-semibold">Keine Events gefunden</span>
                        <span class="fs-7 text-muted">Erstellen Sie Ihr erstes Event</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($events->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap py-2 mr-3">
        {{ $events->links() }}
    </div>
    <div class="d-flex align-items-center py-3">
        <div class="d-flex align-items-center fs-6 fw-semibold text-muted">
            Zeige {{ $events->firstItem() ?? 0 }} bis {{ $events->lastItem() ?? 0 }} von {{ $events->total() }} Einträgen
        </div>
    </div>
</div>
@endif
