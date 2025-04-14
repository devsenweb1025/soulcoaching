<x-auth-layout>
    <!--begin::Forgot Password Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('password.email') }}" method="POST">
        @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Passwort vergessen?</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">Bitte gib deine E-Mail-Adresse ein, um dein Passwort zurückzusetzen.</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" required />
            <!--end::Email-->
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                @include('partials.general._button-indicator', ['label' => 'Reset Password'])
            </button>
            <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Forgot Password Form-->

    @push('scripts')
    <script src="{{ asset('js/custom/authentication/password-reset/password-reset.js') }}"></script>
    @endpush
</x-auth-layout>
