<div class="position-relative">
    <div class="clouds-1"></div>
    <!--begin::Services Section-->
    <div class="mt-20 z-index-1 container position-relative">

        <!--begin::Curve top-->
        <div class="landing-curve landing-light-color opacity-1">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-light-bg rounded">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Dienstleistungen</h1>
                        <div class="text-gray-600 fw-semibold fs-5">
                            Entdecke von diversen Angeboten und Dienstleistungen von mir
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        @php
                            $services = [
                                [
                                    'title' => 'Transformationscoaching',
                                    'description' =>
                                        'Du hast schon viele Lebensaufgaben bewältigt. Doch gerade stehst du an? Dein Geistiges Team weiss, was zu tun ist. Gerne Frage ich an und gemeinsam gehen wir den Weg zu deiner individuellen Lösung.',
                                ],
                                [
                                    'title' => 'Energetische Heilung für Mensch und Tier',
                                    'description' =>
                                        'Du hast körperliche Schmerzen die sich niemand erklären kann oder aber du möchtest deine Energiezentren (Chakren) reinigen und stärken, dann ist die Energetische Heilung das korrekte für dich. Das gilt auch für dein Haustier.',
                                ],
                                [
                                    'title' => 'Tierkommunikation',
                                    'description' =>
                                        'Möchtest du wissen, was dein Tier dir mitteilen möchte – oder warum es sich gerade verändert verhält? Mit Hilfe von telepathischer Tierkommunikation nehme ich Kontakt zu deinem Tier auf, um Antworten, Wünsche und Gefühle sichtbar zu machen. Ob bei Verhaltensauffälligkeiten, gesundheitlichen Fragen oder zur Begleitung im Sterbeprozess: Ich helfe dir, die Verbindung zu deinem Tier zu stärken – liebevoll und intuitiv.',
                                ],
                                [
                                    'title' => 'Frag das Universum',
                                    'description' =>
                                        'Du brauchst jetzt sofort eine Antwort vom Universum? Mit meiner spirituellen Hotline für Kartenlegen bekommst du intuitiv und direkt eine Legung am Telefon – ohne Wartezeit, liebevoll und klar geführt. Ob Liebe, Beruf oder Lebensweg: Die Lenormand-Kartenlegung gibt dir neue Einsichten genau dann, wenn du sie brauchst.',
                                ],
                            ];
                        @endphp

                        @foreach ($services as $service)
                            <div class="col-lg-3" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                                data-aos-delay="500">
                                <div class="card card-shadow card-borderless mb-5 bg-gray-300">
                                    <div class="card-header">
                                        <h2 class="card-title fs-2 fw-bold">
                                            {{ $service['title'] }}
                                        </h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-gray-600 fw-semibold fs-5 description-text">
                                            @php
                                                $text = $service['description'];
                                                $shortText =
                                                    strlen($text) > 135 ? substr($text, 0, 135) . '...' : $text;
                                            @endphp
                                            <span class="short-text">{{ $shortText }}</span>
                                            <span class="full-text" style="display: none;">{{ $text }}</span>
                                        </div>
                                        <a href="#" class="text-primary show-more-link">Mehr anzeigen</a>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-toolbar text-center">
                                            <button type="button" class="btn btn-primary">
                                                zu den Preisen
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--end::Pricing-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-light-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Services Section-->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showMoreLinks = document.querySelectorAll('.show-more-link');

        showMoreLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const descriptionText = this.previousElementSibling;
                const shortText = descriptionText.querySelector('.short-text');
                const fullText = descriptionText.querySelector('.full-text');
                const isExpanded = fullText.style.display !== 'none';

                if (isExpanded) {
                    fullText.style.display = 'none';
                    shortText.style.display = 'inline';
                    this.textContent = 'Mehr anzeigen';
                } else {
                    fullText.style.display = 'inline';
                    shortText.style.display = 'none';
                    this.textContent = 'Weniger anzeigen';
                }
            });
        });
    });
</script>
