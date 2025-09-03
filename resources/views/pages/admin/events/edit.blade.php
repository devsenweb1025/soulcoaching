<x-base-layout>
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3>Event bearbeiten: {{ $event->title }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.events.index') }}" class="btn btn-light me-3">
                    <i class="ki-duotone ki-arrow-left fs-2"></i>
                    Zurück
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Event-Titel</label>
                    <div class="col-lg-8">
                        <input type="text" name="title" class="form-control form-control-solid @error('title') is-invalid @enderror" 
                               value="{{ old('title', $event->title) }}" placeholder="Event-Titel eingeben" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Beschreibung</label>
                    <div class="col-lg-8">
                        <textarea name="description" class="form-control form-control-solid @error('description') is-invalid @enderror" 
                                  rows="3" placeholder="Event-Beschreibung (optional)">{{ old('description', $event->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Event-Datum</label>
                    <div class="col-lg-8">
                        <input type="date" name="event_date" class="form-control form-control-solid @error('event_date') is-invalid @enderror" 
                               value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" required>
                        @error('event_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Startzeit</label>
                    <div class="col-lg-8">
                                                                    <input type="time" name="start_time" class="form-control form-control-solid @error('start_time') is-invalid @enderror" 
                                                   value="{{ old('start_time', $event->start_time) }}" required>
                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Endzeit</label>
                    <div class="col-lg-8">
                                                                    <input type="time" name="end_time" class="form-control form-control-solid @error('end_time') is-invalid @enderror" 
                                                   value="{{ old('end_time', $event->end_time) }}" required>
                        @error('end_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Zoom-Link</label>
                    <div class="col-lg-8">
                        <input type="url" name="zoom_link" class="form-control form-control-solid @error('zoom_link') is-invalid @enderror" 
                               value="{{ old('zoom_link', $event->zoom_link) }}" placeholder="https://zoom.us/j/..." required>
                        @error('zoom_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kategorie</label>
                    <div class="col-lg-8">
                        <input type="text" name="category" class="form-control form-control-solid @error('category') is-invalid @enderror" 
                               value="{{ old('category', $event->category) }}" placeholder="z.B. Kartenlegung, Meditation, etc." required>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kategorie-Farbe</label>
                    <div class="col-lg-8">
                        <select name="category_color" class="form-select form-select-solid @error('category_color') is-invalid @enderror" required>
                            <option value="">Farbe auswählen</option>
                            <option value="bg-primary" {{ old('category_color', $event->category_color) == 'bg-primary' ? 'selected' : '' }}>Primär (Blau)</option>
                            <option value="bg-success" {{ old('category_color', $event->category_color) == 'bg-success' ? 'selected' : '' }}>Erfolg (Grün)</option>
                            <option value="bg-info" {{ old('category_color', $event->category_color) == 'bg-info' ? 'selected' : '' }}>Info (Hellblau)</option>
                            <option value="bg-warning" {{ old('category_color', $event->category_color) == 'bg-warning' ? 'selected' : '' }}>Warnung (Gelb)</option>
                            <option value="bg-danger" {{ old('category_color', $event->category_color) == 'bg-danger' ? 'selected' : '' }}>Gefahr (Rot)</option>
                            <option value="bg-secondary" {{ old('category_color', $event->category_color) == 'bg-secondary' ? 'selected' : '' }}>Sekundär (Grau)</option>
                        </select>
                        @error('category_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Sortierung</label>
                    <div class="col-lg-8">
                        <input type="number" name="sort_order" class="form-control form-control-solid @error('sort_order') is-invalid @enderror" 
                               value="{{ old('sort_order', $event->sort_order) }}" min="0" step="1">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Status</label>
                    <div class="col-lg-8">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $event->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                Event ist aktiv
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.events.index') }}" class="btn btn-light btn-active-light-primary me-2">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Änderungen speichern</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-base-layout>
