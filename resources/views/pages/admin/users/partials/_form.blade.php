<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">First Name</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="First Name eingeben" value="{{ old('first_name', $user->first_name ?? '') }}" required />
    <!--end::Input-->

    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Last Name</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Last Name eingeben" value="{{ old('last_name', $user->last_name ?? '') }}" required />
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
        <input class="form-check-input" name="email_verified" type="checkbox" {{ isset($user) && $user->email_verified_at ? 'checked' : '' }} />
    </div>
    <!--end::Input-->
</div>
<!--end::Input group-->
