<x-auth-layout>
    <!--begin::Verify Email Form-->
    <div class="w-100">
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">E-Mail-Verifizierung</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @elseif (session('status') === 'verification-link-sent')
                    <div class="alert alert-success">
                        Ein neuer Bestätigungslink wurde an deine E-Mail-Adresse gesendet.
                    </div>
                @elseif (request()->has('verified') && request()->verified == 1)
                    <div class="alert alert-success">
                        Ihre E-Mail-Adresse wurde erfolgreich bestätigt! Sie sind jetzt angemeldet.
                    </div>
                @else
                    Vielen Dank für Ihre Registrierung! Bevor Sie beginnen, bestätigen Sie bitte Ihre E-Mail-Adresse, indem Sie auf den Link klicken, den wir Ihnen gerade per E-Mail gesendet haben. Wenn Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue.
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
                        Bestätigungs-E-Mail erneut senden
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-light-primary fw-bolder">
                        Abmelden
                    </button>
                </form>
            @endif
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Verify Email Form-->
</x-auth-layout>
