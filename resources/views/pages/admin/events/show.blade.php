<x-base-layout>
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3>Event Details: {{ $event->title }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary me-3">
                    <i class="ki-duotone ki-pencil fs-2"></i>
                    Bearbeiten
                </a>
                <a href="{{ route('admin.events.index') }}" class="btn btn-light">
                    <i class="ki-duotone ki-arrow-left fs-2"></i>
                    Zurück
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Event-Titel</label>
                <div class="col-lg-8">
                    <span class="text-dark fw-bold fs-6">{{ $event->title }}</span>
                </div>
            </div>

            @if($event->description)
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Beschreibung</label>
                <div class="col-lg-8">
                    <span class="text-dark fs-6">{{ $event->description }}</span>
                </div>
            </div>
            @endif

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Event-Datum</label>
                <div class="col-lg-8">
                    <span class="text-dark fw-bold fs-6">{{ $event->formatted_date }}</span>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Zeit</label>
                <div class="col-lg-8">
                    <span class="text-dark fw-bold fs-6">{{ $event->formatted_time }}</span>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Zoom-Link</label>
                <div class="col-lg-8">
                    <a href="{{ $event->zoom_link }}" target="_blank" class="text-primary fw-bold fs-6">
                        {{ $event->zoom_link }}
                    </a>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Kategorie</label>
                <div class="col-lg-8">
                    <span class="badge badge-light-{{ $event->category_color === 'bg-primary' ? 'primary' : ($event->category_color === 'bg-success' ? 'success' : ($event->category_color === 'bg-info' ? 'info' : 'warning')) }}">
                        {{ $event->category }}
                    </span>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Status</label>
                <div class="col-lg-8">
                    @if($event->is_active)
                        <span class="badge badge-light-success">Aktiv</span>
                    @else
                        <span class="badge badge-light-warning">Inaktiv</span>
                    @endif
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Sortierung</label>
                <div class="col-lg-8">
                    <span class="text-dark fw-bold fs-6">{{ $event->sort_order }}</span>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Erstellt am</label>
                <div class="col-lg-8">
                    <span class="text-dark fs-6">{{ $event->created_at->format('d.m.Y H:i') }}</span>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Zuletzt aktualisiert</label>
                <div class="col-lg-8">
                    <span class="text-dark fs-6">{{ $event->updated_at->format('d.m.Y H:i') }}</span>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{ route('admin.events.index') }}" class="btn btn-light btn-active-light-primary me-2">Zurück zur Übersicht</a>
                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary">
                    <i class="ki-duotone ki-pencil fs-2"></i>
                    Event bearbeiten
                </a>
            </div>
        </div>
    </div>
</x-base-layout>
