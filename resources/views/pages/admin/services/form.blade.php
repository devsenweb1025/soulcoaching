<x-base-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{ isset($service) ? 'Dienstleistung bearbeiten' : 'Dienstleistung erstellen' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($service))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-5">
                            <label for="title" class="required form-label">Titel</label>
                            <input type="text"
                                class="form-control form-control-solid @error('title') is-invalid @enderror"
                                id="title" name="title" value="{{ old('title', $service->title ?? '') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="description" class="form-label">Beschreibung</label>
                            <textarea class="form-control form-control-solid @error('description') is-invalid @enderror" id="description"
                                name="description" rows="4">{{ old('description', $service->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="features" class="form-label">Features</label>
                            <div id="features-container">
                                @php
                                    $features = old('features', isset($service) ? $service->features : []);
                                    if (!is_array($features)) {
                                        $features = [];
                                    }
                                @endphp
                                @foreach ($features as $index => $feature)
                                    <div class="input-group mb-3 feature-item">
                                        <input type="text" class="form-control form-control-solid" name="features[]"
                                            value="{{ $feature }}" placeholder="Enter feature">
                                        <button type="button" class="btn btn-icon btn-light-danger remove-feature">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-light-primary mt-2" id="add-feature">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Add Feature
                            </button>
                            @error('features')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="price" class="required form-label">Preis (CHF)</label>
                                    <input type="number" step="0.01"
                                        class="form-control form-control-solid @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $service->price ?? '') }}"
                                        required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="duration" class="required form-label">Dauer (Minuten)</label>
                                    <input type="number"
                                        class="form-control form-control-solid @error('duration') is-invalid @enderror"
                                        id="duration" name="duration"
                                        value="{{ old('duration', $service->duration ?? '') }}" required>
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="method" class="required form-label">Method</label>
                            <select class="form-select form-select-solid @error('method') is-invalid @enderror"
                                id="method" name="method" required>
                                <option value="online"
                                    {{ old('method', $service->method ?? '') === 'online' ? 'selected' : '' }}>Online
                                </option>
                                <option value="in-person"
                                    {{ old('method', $service->method ?? '') === 'in-person' ? 'selected' : '' }}>In
                                    Person</option>
                                <option value="hybrid"
                                    {{ old('method', $service->method ?? '') === 'hybrid' ? 'selected' : '' }}>Hybrid
                                </option>
                            </select>
                            @error('method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="service_option" class="required form-label">Service Option</label>
                            <select class="form-select form-select-solid @error('service_option') is-invalid @enderror"
                                id="service_option" name="service_option" required>
                                <option value="payment"
                                    {{ old('service_option', $service->service_option ?? '') === 'payment' ? 'selected' : '' }}>
                                    Payment</option>
                                <option value="booking"
                                    {{ old('service_option', $service->service_option ?? '') === 'booking' ? 'selected' : '' }}>
                                    Booking</option>
                            </select>
                            @error('service_option')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="benefit_option" class="required form-label">Benefit Option</label>
                            <select class="form-select form-select-solid @error('benefit_option') is-invalid @enderror"
                                id="benefit_option" name="benefit_option" required>
                                <option value="month"
                                    {{ old('benefit_option', $service->benefit_option ?? '') === 'month' ? 'selected' : '' }}>
                                    Month</option>
                                <option value="hour"
                                    {{ old('benefit_option', $service->benefit_option ?? '') === 'hour' ? 'selected' : '' }}>
                                    Hour</option>
                                <option value="min"
                                    {{ old('benefit_option', $service->benefit_option ?? '') === 'min' ? 'selected' : '' }}>
                                    Minute</option>
                                <option value="per call"
                                    {{ old('benefit_option', $service->benefit_option ?? '') === 'per call' ? 'selected' : '' }}>
                                    Per call</option>
                                <option value="one time"
                                    {{ old('benefit_option', $service->benefit_option ?? '') === 'one time' ? 'selected' : '' }}>
                                    One Time</option>
                            </select>
                            @error('benefit_option')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-5">
                            <label for="image" class="form-label">Hauptbild</label>
                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ isset($service) && $service->image ? asset('storage/' . $service->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                                </div>
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Bild ändern">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="image_remove" />
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    title="Bild abbrechen">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    title="Bild entfernen">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="image_direction" class="required form-label">Image Direction</label>
                            <select
                                class="form-select form-select-solid @error('image_direction') is-invalid @enderror"
                                id="image_direction" name="image_direction" required>
                                <option value="left"
                                    {{ old('image_direction', $service->image_direction ?? '') === 'left' ? 'selected' : '' }}>
                                    Left</option>
                                <option value="right"
                                    {{ old('image_direction', $service->image_direction ?? '') === 'right' ? 'selected' : '' }}>
                                    Right</option>
                            </select>
                            @error('image_direction')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number"
                                class="form-control form-control-solid @error('sort_order') is-invalid @enderror"
                                id="sort_order" name="sort_order"
                                value="{{ old('sort_order', $service->sort_order ?? 0) }}">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured"
                                    value="1"
                                    {{ old('is_featured', $service->is_featured ?? false) ? 'checked' : '' }} />
                                <label class="form-check-label" for="is_featured">Hervorgehobene Dienstleistung</label>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                    value="1"
                                    {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }} />
                                <label class="form-check-label" for="is_active">Aktiv</label>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" id="hotline_active"
                                    name="hotline_active" value="1"
                                    {{ old('hotline_active', $service->hotline_active ?? false) ? 'checked' : '' }} />
                                <label class="form-check-label" for="hotline_active">Hotline Active</label>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" id="is_live_chat"
                                    name="is_live_chat" value="1"
                                    {{ old('is_live_chat', $service->is_live_chat ?? false) ? 'checked' : '' }} />
                                <label class="form-check-label" for="is_live_chat">Live Chat Active</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light me-3">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($service) ? 'Dienstleistung aktualisieren' : 'Dienstleistung erstellen' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-base-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featuresContainer = document.getElementById('features-container');
        const addFeatureBtn = document.getElementById('add-feature');

        // Add new feature input
        addFeatureBtn.addEventListener('click', function() {
            const featureItem = document.createElement('div');
            featureItem.className = 'input-group mb-3 feature-item';
            featureItem.innerHTML = `
                <input type="text" class="form-control form-control-solid"
                    name="features[]" placeholder="Enter feature">
                <button type="button" class="btn btn-icon btn-light-danger remove-feature">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            `;
            featuresContainer.appendChild(featureItem);
        });

        // Remove feature input
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
                e.target.closest('.feature-item').remove();
            }
        });
    });

    // Initialize image input
    var imageInputElement = document.querySelector("[data-kt-image-input='true']");
    if (imageInputElement) {
        var imageInput = new KTImageInput(imageInputElement);
    }
</script>
