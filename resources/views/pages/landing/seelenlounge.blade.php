<x-landing-layout>
    @section('title', 'Seelenlounge für spirituellen Austausch & Coaching – Seelenfluesterin')
    @section('description', 'Kostenlose Zoom-Meetings für Austausch, Inspiration & persönliche Entwicklung. Spirituelle Themen und Coaching in kleiner Runde – jetzt Platz sichern.')

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
            <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel d-inline-block align-middle">
                    Seelenlounge
                </h1>
                <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                    Kostenlose Zoom-Meetings zu diversen Themen. Melde dich an, tausche dich mit Gleichgesinnten aus und
                    finde Inspiration und neuen Halt – besonders in Zeiten von Krisen oder Umbrüchen.
                </p>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
        </div>

        <div class="position-relative z-index-1">
            <div class="clouds-1"></div>
            <!--begin::Main Content Section-->
            <div class="mt-sm-n20 position-relative mt-20 mb-20">
                <!--begin::Wrapper-->
                <div class="landing-light-bg position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Content-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col - Main Content (5/10)-->
                                <div class="col-xl-6 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="0">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-body pt-10">
                                            <h2 class="text-gray-900 mb-8 fw-boldest font-cinzel">Herzlich willkommen zu
                                                unseren wöchentlichen Donnerstag-Calls!</h2>

                                            <div class="mb-6">
                                                <p class="fs-6 text-gray-800 mb-4">
                                                    Jeden Donnerstag lade ich bis zu fünf Personen ein, um gemeinsam in
                                                    spannende Themen der Persönlichkeitsentwicklung, Spiritualität und
                                                    Kartenlegung einzutauchen.
                                                </p>

                                                <p class="fs-6 text-gray-800 mb-4">
                                                    Diese interaktiven Sessions bieten dir die Möglichkeit, dich
                                                    auszutauschen, neue Erkenntnisse zu gewinnen und deine persönliche Reise
                                                    zu bereichern.
                                                </p>

                                                <p class="fs-6 text-gray-800 mb-4">
                                                    Der Zugang zu diesen Calls erfolgt über den bereitgestellten Link.
                                                </p>

                                                <div class="alert alert-warning d-flex align-items-center p-5 mb-6">
                                                    <i class="ki-duotone ki-information-5 fs-2hx text-warning me-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <h5 class="mb-1 fw-bold text-warning">WICHTIG</h5>
                                                        <span class="fs-6 text-gray-800">
                                                            Da ich eine hochsensitive Person bin und die Energien gerne
                                                            positiv halten möchte, ist der Raum auf 5 Personen beschränkt.
                                                            Sei also schnell und sichere dir deinen Platz – die ersten 5,
                                                            die im Raum sind, erhalten den Platz.
                                                        </span>
                                                    </div>
                                                </div>

                                                <p class="fs-6 text-gray-800 mb-6">
                                                    Ich freue mich auf inspirierende Gespräche und Erkenntnisse mit dir!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col - Image (5/10)-->
                                <div class="col-xl-6 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="0">
                                    <div class="w-100 h-400px h-md-500px object-fit-cover rounded"
                                        style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url('{{ asset(theme()->getMediaUrlPath() . 'landing/seelenlounge.webp') }}')">
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Main Content Section-->

            <!--begin::Events Section-->
            <div class="mt-sm-n20 position-relative mt-20 mb-20">
                <!--begin::Wrapper-->
                <div class="landing-light-bg position-relative z-index-2">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Events-->
                        <div class="d-flex flex-column pt-lg-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="events">Themen für diesen Monat</h1>
                                <div class="text-gray-600 fw-semibold fs-5">Entdecke unsere kommenden spirituellen Sessions
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Events Grid-->
                            <div class="row g-10 justify-content-center">
                                @forelse($events as $index => $event)
                                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                                    data-aos-duration="500" data-aos-delay="{{ $index * 100 }}">
                                    <div class="card card-shadow shadow card-borderless mb-5 h-100 bg-white">
                                        <div class="card-header ribbon ribbon-top ribbon-inner h-100">
                                            <h3 class="text-gray-900 mb-5 fw-boldest pt-10">{{ $event->title }}</h3>
                                            <div class="ribbon-label {{ $event->category_color }}">{{ $event->category }}</div>
                                        </div>
                                        <div class="card-body pt-1 d-flex flex-column justify-content-between">
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="ki-duotone ki-calendar fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">{{ $event->formatted_date }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <i class="ki-duotone ki-clock fs-2 text-primary me-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <span class="fs-6 fw-semibold text-gray-800">{{ $event->formatted_time }}</span>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrationModal" data-event-id="{{ $event->id }}" data-event-title="{{ $event->title }}">
                                                    Anmelden
                                                </button>
                                                <a href="{{ $event->zoom_link }}" target="_blank" class="btn btn-outline-primary">
                                                    <i class="ki-duotone ki-video fs-4 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Seelenraum betreten (Zoom)
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center">
                                    <div class="alert alert-info">
                                        <i class="ki-duotone ki-calendar fs-2x text-info me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span class="fs-6 fw-semibold">Derzeit sind keine Seelenlounge Termine geplant.</span>
                                        <br>
                                        <span class="fs-7 text-muted">Schaue gerne später wieder vorbei oder kontaktiere mich für weitere Informationen.</span>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <!--end::Events Grid-->
                        </div>
                        <!--end::Events-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Events Section-->
        </div>

        <!-- Registration Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registrationModalLabel">Für Event anmelden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registrationForm">
                            <input type="hidden" id="eventId" name="event_id">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail-Adresse *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name (optional)</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="alert alert-info">
                                <i class="ki-duotone ki-information-5 fs-2 text-info me-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <span class="fs-7">Den Zoom Link findest du auf der Website bei den Seelenlounge Terminen.</span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="button" class="btn btn-primary" id="submitRegistration">Anmelden</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Anmeldung erfolgreich!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="ki-duotone ki-check-circle fs-3x text-success mb-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <p class="fs-6">Vielen Dank für Ihre Anmeldung! Sie können den Zoom-Link auf der Website finden.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const registrationModal = document.getElementById('registrationModal');
                const successModal = document.getElementById('successModal');
                const registrationForm = document.getElementById('registrationForm');
                const submitBtn = document.getElementById('submitRegistration');
                const eventIdInput = document.getElementById('eventId');

                // Handle registration button clicks
                document.querySelectorAll('[data-bs-target="#registrationModal"]').forEach(button => {
                    button.addEventListener('click', function() {
                        const eventId = this.getAttribute('data-event-id');
                        const eventTitle = this.getAttribute('data-event-title');
                        
                        eventIdInput.value = eventId;
                        document.getElementById('registrationModalLabel').textContent = `Für "${eventTitle}" anmelden`;
                        
                        // Clear form
                        registrationForm.reset();
                        eventIdInput.value = eventId;
                    });
                });

                // Handle form submission
                submitBtn.addEventListener('click', function() {
                    const formData = new FormData(registrationForm);
                    
                    // Disable submit button
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Wird verarbeitet...';

                    fetch('{{ route("event.register") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Close registration modal
                            const modal = bootstrap.Modal.getInstance(registrationModal);
                            modal.hide();
                            
                            // Show success modal
                            const successModalInstance = new bootstrap.Modal(successModal);
                            successModalInstance.show();
                        } else {
                            toastr.error(data.message || 'Ein Fehler ist aufgetreten. Bitte versuche es erneut.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('Ein Fehler ist aufgetreten. Bitte versuche es erneut.');
                    })
                    .finally(() => {
                        // Re-enable submit button
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Anmelden';
                    });
                });
            });
        </script>

    </x-landing-layout>
