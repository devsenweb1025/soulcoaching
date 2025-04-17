<x-base-layout>
    <!--begin::Container-->
    <div class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h2>Profil</h2>
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!--begin::Avatar-->
                    <div class="d-flex flex-column align-items-center mb-10">
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            @if ($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="Avatar">
                            @else
                                <div class="symbol-label fs-2x bg-primary text-inverse-primary">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-7">
                            <label class="btn btn-sm btn-light-primary">
                                Avatar ändern
                                <input type="file" name="avatar" class="d-none" accept="image/*">
                            </label>
                        </div>
                    </div>
                    <!--end::Avatar-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Vorname</label>
                            <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('first_name', $user->first_name) }}" required />
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Nachname</label>
                            <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('last_name', $user->last_name) }}" required />
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">E-Mail</label>
                            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                value="{{ old('email', $user->email) }}" required />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Aktuelles Passwort</label>
                            <input type="password" name="current_password"
                                class="form-control form-control-solid mb-3 mb-lg-0" required />
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <div class="col-md-6">
                            <label class="fw-semibold fs-6 mb-2">Neues Passwort</label>
                            <input type="password" name="password"
                                class="form-control form-control-solid mb-3 mb-lg-0" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold fs-6 mb-2">Passwort bestätigen</label>
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-solid mb-3 mb-lg-0" />
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Speichern</span>
                            <span class="indicator-progress">Bitte warten...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-base-layout>

@push('scripts')
    <script>
        // Handle avatar preview
        document.querySelector('input[name="avatar"]').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.symbol img').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
