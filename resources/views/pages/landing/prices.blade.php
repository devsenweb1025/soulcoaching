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
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Preise
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">
                Melde dich jetzt und profitiere von unschlagbaren Preisen
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    @php
        $services = [
            [
                'title' => 'Transformationscoaching',
                'description' =>
                    'Du hast schon viele Lebensaufgaben bewältigt. Doch gerade stehst du an? Dein Geistiges Team weiss, was zu tun ist. Gerne Frage ich an und gemeinsam gehen wir den Weg zu deiner individuellen Lösung.',
                'price' => 'CHF 2222 / Monat Vorteile:',
                'image' => 'coaching.webp',
                'features' => [
                    'Booklet mit 100 Seiten',
                    'Schneller ans Ziel durch die Arbeit auf allen 5 Bewusstseinebenen',
                    'Fairer Preis',
                    'Wöchentlich 1x Zoom Call von einer Stunde mit mir',
                ],
                'button' => 'Jetzt Buchen!',
                'button_link' => route('booking'),
            ],
            [
                'title' => 'Energetische Heilung für Mensch und Tier',
                'description' =>
                    'Du hast körperliche Schmerzen die sich niemand erklären kann oder aber du möchtest deine Energiezentren (Chakren) reinigen und stärken, dann ist die Energetische Heilung das korrekte für dich. Das gilt auch für dein Haustier.',
                'price' => 'CHF 111.- / Stunde Vorteile:',
                'image' => 'courses-2.webp',
                'features' => ['sofortige Wirkung', 'sofortige Steigerung des Körperlichen und mentalen Wohlbefinden'],
                'button' => 'Jetzt Buchen!',
                'button_link' => route('booking'),
            ],
            [
                'title' => 'Tierkommunikation',
                'description' =>
                    'Möchtest du wissen, was dein Tier dir mitteilen möchte – oder warum es sich gerade verändert verhält? Mit Hilfe von telepathischer Tierkommunikation nehme ich Kontakt zu deinem Tier auf, um Antworten, Wünsche und Gefühle sichtbar zu machen. Ob bei Verhaltensauffälligkeiten, gesundheitlichen Fragen oder zur Begleitung im Sterbeprozess: Ich helfe dir, die Verbindung zu deinem Tier zu stärken – liebevoll und intuitiv.',
                'price' => 'CHF 77.- / pro Gespräch Vorteile:',
                'image' => 'tier.webp',
                'features' => [
                    'Du erhälst eine 1:1 Sprachaufnahme, wo ich 1:1 das was dein Tier sagt weitergebe',
                    'Ich bin auch noch nach der Sitzung 1-2 Tage für Fragen erreichbar.',
                ],
                'button' => 'Jetzt Buchen!',
                'button_link' => route('booking'),
            ],
            [
                'title' => 'Frag das Universum',
                'description' =>
                    'Du brauchst jetzt sofort eine Antwort vom Universum? Mit meiner spirituellen Hotline für Kartenlegen bekommst du intuitiv und direkt eine Legung am Telefon – ohne Wartezeit, liebevoll und klar geführt. Ob Liebe, Beruf oder Lebensweg: Die Lenormand-Kartenlegung gibt dir neue Einsichten genau dann, wenn du sie brauchst.',
                'price' => 'CHF 2.50.- / min Vorteile:',
                'image' => 'medial.webp',
                'features' => ['Sofortige Klarheit', 'Direkter Kontakt', 'Antwort auf konkrete Lebensfragen'],
                'button' => 'Jetzt Anrufen',
                'button_link' => route('services'),
            ],
        ];
    @endphp

    @foreach ($services as $index => $service)
        <!--begin::Pricing Section-->
        <div class="mt-sm-n20 position-relative mt-20 mb-20">
            <div class="clouds-{{ ($index % 4) + 1 }}"></div>
            <!--begin::Wrapper-->
            <div class="landing-light-bg position-relative z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Plans-->
                    <div class="d-flex flex-column pt-lg-20">
                        <!--begin::Heading-->
                        <div class="mb-13 {{ $index % 2 == 0 ? 'text-start' : 'text-end' }}">
                            <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                                data-kt-scroll-offset="{default: 100, lg: 150}">{{ $service['title'] }}</h1>
                            <div class="text-gray-600 fw-semibold fs-5">{{ $service['description'] }}</div>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Pricing-->
                        <div class="text-start" id="kt_pricing">
                            <!--begin::Row-->
                            <div class="row g-10">
                                @if ($index % 2 == 0)
                                    <!--begin::Col-->
                                    <div class="col-xl-4 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest">{{ $service['title'] }}
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="text-start">
                                                        <span
                                                            class="fs-3x fw-bold text-primary">{{ $service['price'] }}</span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    @foreach ($service['features'] as $feature)
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack mb-5">
                                                            <span
                                                                class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                            <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Item-->
                                                    @endforeach
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                @if($service['button'] === 'Jetzt Anrufen')
                                                    <a href="{{ $service['button_link'] }}" class="btn btn-primary">{{ $service['button'] }}</a>
                                                @else
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $index }}">
                                                        {{ $service['button'] }}
                                                    </button>
                                                @endif
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="w-100 h-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/' . $service['image']) }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                @else
                                    <!--begin::Col-->
                                    <div class="col-xl-8 col-md-6" data-aos="fade-right" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="w-100 h-100 object-fit-cover"
                                            style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/' . $service['image']) }})">
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-4 col-md-6" data-aos="fade-left" data-aos-easing="linear"
                                        data-aos-duration="500" data-aos-delay="500">
                                        <div class="d-flex h-100 align-items-center">
                                            <!--begin::Option-->
                                            <div
                                                class="w-100 d-flex flex-column flex-start rounded-3 bg-body py-15 px-10">
                                                <!--begin::Heading-->
                                                <div class="mb-7 text-start">
                                                    <!--begin::Title-->
                                                    <h1 class="text-gray-900 mb-5 fw-boldest">{{ $service['title'] }}
                                                    </h1>
                                                    <!--end::Title-->
                                                    <!--begin::Price-->
                                                    <div class="text-start">
                                                        <span
                                                            class="fs-3x fw-bold text-primary">{{ $service['price'] }}</span>
                                                    </div>
                                                    <!--end::Price-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Features-->
                                                <div class="w-100 mb-10">
                                                    @foreach ($service['features'] as $feature)
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack mb-5">
                                                            <span
                                                                class="fw-semibold fs-6 text-gray-800 text-start pe-3">{{ $feature }}</span>
                                                            <i class="ki-duotone ki-check-circle fs-1 text-success">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Item-->
                                                    @endforeach
                                                </div>
                                                <!--end::Features-->
                                                <!--begin::Select-->
                                                @if($service['button'] === 'Jetzt Anrufen')
                                                    <a href="{{ $service['button_link'] }}" class="btn btn-primary">{{ $service['button'] }}</a>
                                                @else
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $index }}">
                                                        {{ $service['button'] }}
                                                    </button>
                                                @endif
                                                <!--end::Select-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                @endif
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Pricing-->
                    </div>
                    <!--end::Plans-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Pricing Section-->

        @if($service['button'] !== 'Jetzt Anrufen')
        <!--begin::Modal-->
        <div class="modal fade" tabindex="-1" id="bookingModal{{ $index }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">{{ $service['title'] }}</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-5">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" name="bookingType{{ $index }}" value="personal" checked>
                                <span class="form-check-label">Persönliche Buchung</span>
                            </label>
                        </div>
                        <div class="mb-5">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" name="bookingType{{ $index }}" value="group">
                                <span class="form-check-label">Gruppenbuchung</span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="button" class="btn btn-primary" onclick="handleBooking({{ $index }}, '{{ $service['title'] }}')">Bestätigen</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
        @endif
    @endforeach

    @push('scripts')
    <script>
        function handleBooking(index, serviceTitle) {
            const bookingType = document.querySelector(`input[name="bookingType${index}"]:checked`).value;

            if (bookingType === 'personal') {
                window.location.href = "{{ route('payment') }}?service=" + encodeURIComponent(serviceTitle);
            } else {
                window.location.href = "{{ route('booking') }}?service=" + encodeURIComponent(serviceTitle);
            }
        }
    </script>
    @endpush

</x-landing-layout>
