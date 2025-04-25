<x-landing-layout>
    @include('pages.landing._partials._background')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <div class="cloud">
            <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
                data-framer-background-image-wrapper="true">
                <img decoding="async" loading="lazy"
                    src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png" alt=""
                    style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
            </div>
        </div>
        <!--begin::Heading-->
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Erreichen Sie mich jederzeit
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                Hast du Fragen zu einer Sitzung in spiritueller Lebensberatung, energetischem Heilen, Tierkommunikation
                oder zum Ablauf eines spirituellen Coachings?<br /><br />
                Ich bin für dich da – ob du in der Schweiz, in Österreich oder Deutschland lebst.<br /><br />
                Schreib mir direkt über das Kontaktformular oder ruf mich an – ich freue mich auf deine Anfrage.
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->
    <div class="position-relative">
        <div class="clouds-2"></div>
        <!--begin::Testimonials Section-->
        <div class="mt-20 mb-20 position-relative z-index-2">
            <!--begin::Container-->
            <div class="container mt-4">
                <div class="row">
                    <!-- Sticky Sidebar -->
                    <div class="col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="500">
                        <div class="sticky-sidebar p-3 border rounded"
                            style="position: sticky; top: 150px; height: fit-content;">
                            <div class="card shadow mb-15 p-10">
                                <div class="card-body">
                                    <div class="mb-15 mb-md-10 mb-sm-5 fs-2x d-flex align-items-center">
                                        <span
                                            class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-5">
                                            {!! theme()->getIcon('sms', 'fs-2tx text-primary') !!}
                                        </span>
                                        <span class="ml-5">Maile mir</span>
                                    </div>
                                    <div class="text-gray-800 fs-2 mb-5">
                                        Fragen zu den Angeboten oder sonstiges anliegen? Du kannst mir gerne per Mail
                                        schreiben.
                                    </div>
                                    <span class="fw-normal fs-4">
                                        <a href="mailto:info@seelen-fluesterin.ch"
                                            class="text-hover-primary">info@seelen-fluesterin.ch</a></span>
                                </div>
                            </div>

                            <div class="card shadow mb-15 p-10">
                                <div class="card-body">
                                    <div class="mb-15 mb-md-10 mb-sm-5 fs-2x d-flex align-items-center">
                                        <span
                                            class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-5">
                                            {!! theme()->getIcon('user', 'fs-2tx text-primary') !!}
                                        </span>
                                        <span class="ml-5">Zoom Meeting</span>
                                    </div>
                                    <div class="text-gray-800 fs-2 mb-5">
                                        Hast Du ein grösseres Anliegen und möchtest ein Gespräch mit mir? Melde dich
                                        über das Kontaktformular und wir vereinbaren gemeinsam einen Termin.
                                    </div>
                                    <a href="{{ route('booking') }}" class="btn btn-primary">
                                        Termin buchen
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Long Scrolling Content -->
                    <div class="col-md-6 p-3 border rounded" data-aos="zoom-in" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="500">
                        <div class="card shadow mb-15 p-10">
                            <div class="card-body">
                                <div
                                    class="mb-15 mb-md-10 mb-sm-5 fs-2x d-flex flex-column justify-content-center align-items-center">
                                    <div
                                        class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-5 mb-5">
                                        {!! theme()->getIcon('user', 'fs-2tx text-primary') !!}
                                    </div>
                                    <div class="text-center">Gerne helfe ich Dir weiter!<br />Melde dich bei mir.</div>
                                </div>
                                <div class="text-gray-800 fs-2 mb-5">
                                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                                        @csrf
                                        <div class="mb-10">
                                            <label for="name_input" class="required form-label">Vor- und
                                                Nachname</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Max Muster" id="name_input" name="name" required>
                                        </div>
                                        <div class="mb-10">
                                            <label for="email_input" class="required form-label">Mail Adresse</label>
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="maxmuster@hotmail.com" id="email_input" name="email" required>
                                        </div>
                                        <div class="mb-10">
                                            <label for="phone_input" class="required form-label">Telefonnummer</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="+41" id="phone_input" name="phone" required>
                                        </div>
                                        <div class="mb-10">
                                            <label for="reason_input" class="required form-label">Um welche
                                                Dienstleistung handelt es sich?</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Dienstleistung und Produkt angeben" id="reason_input" name="service" required>
                                        </div>
                                        <div class="mb-10">
                                            <label for="description_input" class="required form-label">Beschreiben Sie
                                                ihr Anliegen</label>
                                            <textarea class="form-control form-control-solid" placeholder="Ihre Nachricht" id="description_input"
                                                style="height: 100px" name="description" required></textarea>
                                        </div>
                                        <div class="mb-10">
                                            <input type="checkbox" id="confirm_input" class="form-check-input" name="confirm" required>
                                            <label for="confirm_input" class="form-check-label fs-6">Hiermit bestätige
                                                ich,
                                                dass alle Angaben wahrheitsgetreu gemacht wurden.</label>
                                        </div>
                                        <div class="mb-10">
                                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                            <div id="recaptcha-error" class="text-danger mt-2" style="display: none;"></div>
                                        </div>
                                        <div>
                                            <button type="submit" class="form-control btn btn-primary" id="submitButton">
                                                <span class="indicator-label">Nachricht senden</span>
                                                <span class="indicator-progress" style="display: none;">
                                                    Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Testimonials Section-->
    </div>

    @include('pages.landing._partials._faqs')

</x-landing-layout>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitButton = document.getElementById('submitButton');
        const indicatorLabel = submitButton.querySelector('.indicator-label');
        const indicatorProgress = submitButton.querySelector('.indicator-progress');
        const recaptchaError = document.getElementById('recaptcha-error');

        // Reset recaptcha error
        recaptchaError.style.display = 'none';

        // Check if reCAPTCHA is completed
        const recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            recaptchaError.textContent = 'Bitte bestätigen Sie, dass Sie kein Roboter sind.';
            recaptchaError.style.display = 'block';
            return;
        }

        // Disable submit button and show loading state
        submitButton.disabled = true;
        indicatorLabel.style.display = 'none';
        indicatorProgress.style.display = 'inline-block';

        try {
            const formData = new FormData(this);
            formData.append('g-recaptcha-response', recaptchaResponse);

            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok) {
                Swal.fire({
                    text: data.message || 'Ihre Nachricht wurde erfolgreich gesendet!',
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Weiter!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                }).then(() => {
                    this.reset();
                    grecaptcha.reset(); // Reset reCAPTCHA after successful submission
                });
            } else {
                throw new Error(data.message || 'Ein Fehler ist aufgetreten');
            }
        } catch (error) {
            Swal.fire({
                text: error.message || 'Ein Fehler ist aufgetreten',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Weiter!",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        } finally {
            // Re-enable submit button
            submitButton.disabled = false;
            indicatorLabel.style.display = 'inline-block';
            indicatorProgress.style.display = 'none';
        }
    });
</script>
