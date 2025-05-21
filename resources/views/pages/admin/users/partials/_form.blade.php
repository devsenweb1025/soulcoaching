<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Name</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name eingeben" value="{{ old('name', $user->name ?? '') }}" required />
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">E-Mail</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="E-Mail eingeben" value="{{ old('email', $user->email ?? '') }}" required />
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Passwort</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Passwort eingeben" {{ isset($user) ? '' : 'required' }} />
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Passwort bestätigen</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="password" name="password_confirmation" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Passwort bestätigen" {{ isset($user) ? '' : 'required' }} />
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Rolle</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select name="role" class="form-select form-select-solid" required>
        <option value="user" {{ (old('role', $user->role ?? '') === 'user') ? 'selected' : '' }}>Benutzer</option>
        <option value="admin" {{ (old('role', $user->role ?? '') === 'admin') ? 'selected' : '' }}>Administrator</option>
    </select>
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Status</label>
    <!--end::Label-->
    <!--begin::Input-->
    <div class="form-check form-switch form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" name="email_verified" value="1" {{ old('email_verified', $user->email_verified_at ?? true) ? 'checked' : '' }} />
        <label class="form-check-label">Aktiv</label>
    </div>
    <!--end::Input-->
</div>
<!--end::Input group-->
