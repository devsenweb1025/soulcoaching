<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Name</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Partner Name" value="{{ old('name', $partner->name ?? '') }}" required />
    <!--end::Input-->
    @error('name')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="name" data-validator="notEmpty">{{ $message }}</div>
        </div>
    @enderror
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Beschreibung</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" rows="4" placeholder="Partner Beschreibung" required>{{ old('description', $partner->description ?? '') }}</textarea>
    <!--end::Input-->
    @error('description')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="description" data-validator="notEmpty">{{ $message }}</div>
        </div>
    @enderror
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Domain</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="url" name="domain" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="https://partner-domain.com" value="{{ old('domain', $partner->domain ?? '') }}" required />
    <!--end::Input-->
    @error('domain')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="domain" data-validator="notEmpty">{{ $message }}</div>
        </div>
    @enderror
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Typ</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select name="type" class="form-select form-select-solid" data-control="select2" data-placeholder="Partner Typ auswählen" required>
        <option value="">Typ auswählen</option>
        <option value="Bericht" {{ (old('type', $partner->type ?? '') == 'Bericht') ? 'selected' : '' }}>Bericht</option>
        <option value="Eingetragene Therapeutin" {{ (old('type', $partner->type ?? '') == 'Eingetragene Therapeutin') ? 'selected' : '' }}>Eingetragene Therapeutin</option>
        <option value="Partner" {{ (old('type', $partner->type ?? '') == 'Partner') ? 'selected' : '' }}>Partner</option>
        <option value="Vereinsmitglied" {{ (old('type', $partner->type ?? '') == 'Vereinsmitglied') ? 'selected' : '' }}>Vereinsmitglied</option>
    </select>
    <!--end::Input-->
    @error('type')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="type" data-validator="notEmpty">{{ $message }}</div>
        </div>
    @enderror
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Partner Logo</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="file" name="image" class="form-control form-control-solid mb-3 mb-lg-0" accept="image/*" {{ !isset($partner) ? 'required' : '' }} />
    <!--end::Input-->
    @error('image')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="image" data-validator="notEmpty">{{ $message }}</div>
        </div>
    @enderror
    @if(isset($partner) && $partner->image)
        <div class="mt-3">
            <img src="{{ asset('storage/partners/' . $partner->image) }}" alt="{{ $partner->name }}" class="w-100px h-100px rounded">
        </div>
    @endif
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Status</label>
    <!--end::Label-->
    <!--begin::Input-->
    <div class="form-check form-switch form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }} />
        <label class="form-check-label">Aktiv</label>
    </div>
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Sortierung</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="sort_order" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Sortierungsnummer" value="{{ old('sort_order', $partner->sort_order ?? 0) }}" />
    <!--end::Input-->
    @error('sort_order')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="sort_order" data-validator="notEmpty">{{ $message }}</div>
        </div>
    @enderror
</div>
<!--end::Input group-->
