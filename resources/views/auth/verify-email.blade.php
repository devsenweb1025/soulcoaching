<x-auth-layout>
    <!--begin::Verify Email Form-->
    <div class="w-100">
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Verify Email</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @elseif (session('status') === 'verification-link-sent')
                    <div class="alert alert-success">
                        {{ __('Ein neuer Bestätigungslink wurde an deine E-Mail-Adresse gesendet.') }}
                    </div>
                @elseif (request()->has('verified') && request()->verified == 1)
                    <div class="alert alert-success">
                        {{ __('Your email has been verified successfully! You are now signed in.') }}
                    </div>
                @else
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                @endif
            </div>
            <!--end::Subtitle-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            @if (!request()->has('verified'))
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-light-primary fw-bolder">
                        {{ __('Log out') }}
                    </button>
                </form>
            @endif
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Verify Email Form-->
</x-auth-layout>
