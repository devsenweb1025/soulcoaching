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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Medien & partner
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                In der heutigen Zeit ist es wichtiger denn je, echte Verbindungen zu schaffen – auch im digitalen Raum.
                <br /><br />
                Als spirituelle Begleiterin, Tierkommunikatorin und Expertin für energetisches Heilen freue ich mich
                über Kooperationen mit Medien, Blogs, Plattformen oder Partnern, die ähnliche Werte teilen.
                <br /><br />
                Es freut mich, dass ich mit den untenstehenden Unternehmen eine Kooperation eingehen durfte, damit du
                bei mir günstiger einkaufen kannst und wir gemeinsam Unternehmen unterstützen, die die Vision einer
                positiven Welt teilen.
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Media Section-->
    <div class="mt-20 mb-20 position-relative">
        <div class="clouds-2"></div>
        <!--begin::Container-->
        <div class="container position-relative z-index-2">
            <div class="card bg-transparent" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                data-aos-delay="0">
                <div class="card-body">
                    <!--begin::Partner Cards-->
                    <div class="row mt-15">
                        @php
                            $partners = [
                                1 => [
                                    'name' => 'Bericht',
                                    'description' =>
                                        'FTMedien ist ein regionaler Medienpartner mit Fokus auf lokale Sichtbarkeit und wirkungsvolle Werbung. Durch die Verbindung von Print und digitalen Kanälen bietet FTMedien vielfältige Möglichkeiten, um Zielgruppen gezielt und professionell anzusprechen.',
                                    'domain' => 'https://www.ftmedien.ch/',
                                    'image' => 'partner4.png',
                                ],
                                2 => [
                                    'name' => 'Bericht',
                                    'description' =>
                                        'Auf gesund.ch findest du alles rund um einen bewussten Lebensstil. Die Plattform bringt Themen wie Gesundheit, Achtsamkeit und ganzheitliches Wohlbefinden auf den Punkt – verständlich, inspirierend und lebensnah. Für uns ist gesund.ch ein wertvoller Ort, um Menschen genau dort zu erreichen, wo Interesse für Gesundheit auf echtes Wissen trifft.',
                                    'domain' => 'https://www.gesund.ch/',
                                    'image' => 'partner3.png',
                                ],
                                3 => [
                                    'name' => 'Partner',
                                    'description' =>
                                        'Mit Berk verbindet uns eine echte Partnerschaft. Ihre Produkte – von Räucherwaren bis hin zu spirituellen Begleitern – schaffen Raum für Achtsamkeit, innere Ruhe und bewusstes Leben. Wir schätzen die Zusammenarbeit mit Berk sehr, denn hier geht es nicht nur um Produkte, sondern um Haltung, Qualität und eine gemeinsame Vision.',
                                    'domain' => 'https://www.berk.de/',
                                    'image' => 'partner2.png',
                                ],
                                4 => [
                                    'name' => 'Partner',
                                    'description' =>
                                        'AuraSomaShop bringt Farbe ins Leben – im wahrsten Sinne des Wortes. Die Philosophie hinter Aura-Soma passt perfekt zu unserem Verständnis von Balance und Selbstfürsorge. Als Partner unterstützt uns AuraSomaShop mit hochwertigen Produkten, die helfen, die eigene Mitte zu stärken und sich selbst besser kennenzulernen.',
                                    'domain' => 'https://www.aurasomashop.ch/',
                                    'image' => 'partner1.png',
                                ],
                                5 => [
                                    'name' => 'Partner',
                                    'description' =>
                                        'Aqua Schweiz ist ein Unternehmen mit Sitz in Würenlos, das sich auf die Aufbereitung und den Vertrieb von levitiertem Wasser spezialisiert hat. Ihr levitiertes Wasser wird an einem besonderen Kraftort abgefüllt, der Energiewerte von über 100\'000 Boviseinheiten aufweist. Diese hohe Energie soll sich positiv auf die Qualität des Wassers auswirken. Zusätzlich bietet Aqua Schweiz Himalaya-Kristallsalzprodukte an, die das Wohlbefinden fördern. Die Zusammenarbeit mit Aqua Schweiz ermöglicht es uns, unseren Kunden hochwertige Produkte für Gesundheit und Wohlbefinden anzubieten.',
                                    'domain' => 'https://aquaschweiz.ch/',
                                    'image' => 'partner5.png',
                                ],
                                5 => [
                                    'name' => 'Vereinsmitglied',
                                    'description' =>
                                        'Ich bin Mitglied im Tarot e.V. – Berufsverband für Tarot und ganzheitliche Lebensberatung. Der Verband fördert die Qualität und Ethik in der Tarot-Beratung und bietet eine Plattform für Austausch, Weiterbildung und fachliche Entwicklung. Als Teil dieser Gemeinschaft engagiere ich mich für eine verantwortungsvolle und achtsame Beratungspraxis.',
                                    'domain' => 'https://tarotverband.de/',
                                    'image' => 'partner6.png',
                                ],
                            ];
                        @endphp

                        @foreach ($partners as $id => $partner)
                            <div class="col-lg-12 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                                data-aos-delay="500">
                                <div class="card shadow h-100">
                                    <div class="card-body position-relative">
                                        <div class="position-absolute top-10 left-10 text-gray-600 fs-4 mb-10">
                                            {{ $partner['name'] }}
                                        </div>
                                        <div class="text-center mb-10">
                                            <div class="d-flex align-items-center justify-content-center"
                                                style="height: 80px;">
                                                <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/partners/' . $partner['image']) }}"
                                                    alt="{{ $partner['name'] }}" class="img-fluid"
                                                    style="max-height: 80px; width: auto;">
                                            </div>
                                        </div>
                                        <div class="text-gray-600 fs-4 mb-10">
                                            {{ $partner['description'] }}
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ $partner['domain'] }}"
                                                class="text-primary text-hover-primary fs-5 fw-bold" target="_blank">
                                                {{ $partner['domain'] }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--end::Partner Cards-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Media Section-->
</x-landing-layout>