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
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Online Shop
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">
                Haben Sie Fragen oder benötigen hilfe? Gerne sind wir für Sie da
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Pricing Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-start">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Kerzen</h1>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        @foreach(range(1, 15) as $index)
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-5">
                                    <div class="w-100 h-200px"
                                        style="background-repeat: no-repeat;background-size: cover;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/' . $index . '.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-5 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-3 fw-bold">
                                            @if($index == 1)
                                                Ritualkerze - Abschiedskerze
                                            @elseif($index == 2)
                                                Ritual - Herzensöffner
                                            @elseif($index == 3)
                                                Ritual - Aurareinigung
                                            @elseif($index == 4)
                                                Ritualkerze - Vollmond
                                            @elseif($index == 5)
                                                Ritual - Neumond
                                            @elseif($index == 6)
                                                Energetisches Räumereinigen
                                            @elseif($index == 7)
                                                Palo Santo
                                            @elseif($index == 8)
                                                Räucherstäbchen - Engel der Fülle
                                            @elseif($index == 9)
                                                Räucherstäbchen - Engel der Liebe
                                            @elseif($index == 10)
                                                Räucherstäbchen - Engel des Vertrauens
                                            @elseif($index == 11)
                                                Kartenset - Engel der Neuzeit
                                            @elseif($index == 12)
                                                Dein Persönlicher Seelencode
                                            @else
                                                Herzens Gutschein
                                            @endif
                                        </h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            <span class="fs-2 fw-bold text-primary">
                                                @if($index == 1)
                                                    CHF 28,90
                                                @elseif($index == 2)
                                                    CHF 24,90
                                                @elseif($index == 3)
                                                    CHF 24,90
                                                @elseif($index == 4)
                                                    CHF 24,90
                                                @elseif($index == 5)
                                                    CHF 24,90
                                                @elseif($index == 6)
                                                    CHF 40,00
                                                @elseif($index == 7)
                                                    CHF 4,50
                                                @elseif($index == 8)
                                                    CHF 5,50
                                                @elseif($index == 9)
                                                    CHF 5,50
                                                @elseif($index == 10)
                                                    CHF 5,50
                                                @elseif($index == 11)
                                                    CHF 30,90
                                                @elseif($index == 12)
                                                    CHF 120,00
                                                @elseif($index == 13)
                                                    CHF 80,00
                                                @elseif($index == 14)
                                                    CHF 50,00
                                                @else
                                                    CHF 120,00
                                                @endif
                                            </span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5 description-text">
                                            @php
                                                $text = '';
                                                if($index == 1) {
                                                    $text = 'Vielleicht ist dein Herzenstier über die Regenbogenbrücke gegangen, oder aber auch ein geliebter Mensch hat diesen Planeten verlassen. Diese Kerze kannst du als Ritualkerze nehmen, um deinem verstorbenen zur Seite zu stehen. Zünde eine Kerze für seinen Weg und für deine Seele an. Bei jeder Kerze erhältst du noch einen kleinen persönlichen Code, welchen ich für dich erstelle.';
                                                } elseif($index == 2) {
                                                    $text = 'Wir denken, dass unser Hirn uns leitet, aber in Wirklichkeit ist es unser Herz, welches uns den Weg weist. Vielleicht hörst du die feine Stimme gerade nicht, dann zünde diese Kerze an und dein Herz spürt deine wohlige Wärme und spricht zu dir. Du bekommst eine gechannelte Nachricht im Paket.';
                                                } elseif($index == 3) {
                                                    $text = 'Die Aura ist dein persönliches Energiefeld. Als Ritual kannst du sie täglich durch Räucherware reinigen und du kannst zusätzlich diese Kerze zur Reinigung deiner Aura anzünden. Lass das Licht in dir gross werden. Zu dieser Kerze erhälst du eine Info über dich, welche ich für dich Channele.';
                                                } elseif($index == 4) {
                                                    $text = 'Der Vollmond hat einige Kräfte die du in diesem Leben für dich Nutzen kannst. Nebst Ritualen und Ritus kannst du das ganze mit der Vollmondkerze verstärken indem du sie bei Vollmond anzündest. Möge dein Leben nach deiner Vorstellungs- und Gedankenkraft verlaufen. Bei jeder Kerze erhältst du noch einen kleinen persönlichen Code, welchen ich für dich erstelle.';
                                                } elseif($index == 5) {
                                                    $text = 'Der Vollmond hat einige Kräfte die du in diesem Leben für dich Nutzen kannst. Nebst Ritualen und Ritus kannst du das ganze mit der Vollmondkerze verstärken indem du sie bei Vollmond anzündest. Möge dein Leben nach deiner Vorstellungs- und Gedankenkraft verlaufen. Bei jeder Kerze erhältst du noch einen kleinen persönlichen Code, welchen ich für dich erstelle.';
                                                } elseif($index == 6) {
                                                    $text = 'Egal, ob an deinem Arbeitsplatz oder in deinem gemütlichen Zuhause. Alle Energien werden an Orten gesammelt. Eine Energetisierende Reinigung lohnt sich also täglich, wöchenltich oder monatlich, um die Energien wieder zu neutralisieren. Du bekommst ein PDF von mir persönlich wie die Reinigung zur Magie wird.';
                                                } elseif($index == 7) {
                                                    $text = 'Palo Santo ist - wie es schon der Name sagt - das "heilige Holz" Südamerikas, vergleichbar mit Sandelholz in Indien. Es wächst hauptsächlich in Peru. Die Peruaner glauben, dass ihr Palo Santo starke Kräfte hat - immerhin gedeiht es auch auf sehr kargen Böden. Es hat die Kraft negative Energien zu vertreiben und ist ein starker Atmosphärenreiniger. Der Geist entspannt und öffnet sich für höhere Sphären. Ein heiliger Raum entsteht für innere Entfaltung, Meditation und Rituale. Eine neue Leichtigkeit breitet sich aus und lässt Sorgen und Probleme verschwinden. Palo Santo ist sehr reichhaltig an ätherischen Ölen und duftet wundervoll aromatisch, mandelartig mit einem Hauch von Kokos.';
                                                } elseif($index == 8) {
                                                    $text = 'Egal, um welche Art Fülle es sich handelt. Ob Finanzen, Gesundheit, Beziehungen oder eine andere Fülle. Dieses Räucherstäbchen zieht den Engel der Fülle an und verhilft dir in deiner Thematik dazu es in die 3D Welt zu bekommen. Du bekommst eine Engelskarte und einen Füllecodevon mir persönlich dazu.';
                                                } elseif($index == 9) {
                                                    $text = 'Engel wünschen sich für uns nur das Beste. Egal ob du gerade deine Selbstliebe oder die grosse Liebe entdecken willst, dieses Räucherstäbchen verhilft dir zu dem zu kommen. Lass den Engelsduft der Liebe dich umgeben. Zu diesen Räucherstäbchen erhältst du eine Engelsbotschaft und ein Liebescode von mir persönlich.';
                                                } elseif($index == 10) {
                                                    $text = 'Vertrauen ist ein Grundkonstrukt für dein Leben. Egal, ob es sich um Selbst-Vertrauen handelt oder darum anderen zu vertrauen. Lass deinen persönlichen Engel der dafür zuständig ist in deine Räume, damit er dich beim Vertrauen unterstützen kann. Zu dieser Bestellung erhältst du von mir eine Engelsbotschaft und ein Vertrauenscode.';
                                                } elseif($index == 11) {
                                                    $text = 'Als du dich entschieden hast noch einmal auf diesen Planten zu kommen und erneut deine Seele lernen zu lassen, warst du wirklich mutig. Im 2025 und die kommenden Jahre wird sich die Welt verändern. Finde dein Inneres Licht und nutze das Kartenset für dich, wenn du den Mut kurzfristig verlierst weiter zu machen.';
                                                } elseif($index == 12) {
                                                    $text = 'Mit deinem Seelencode erfährst du nochmals genau, mit welchen Stärken und Schwächen du geboren wurdest. Denn dein Geburtsdatum sagt das unter anderem aus. Du erfährst dadurch, was du als Talente bekommen hast oder auch welche Herausforderungen dir dein Code gegeben hat. Dein Seelencode hilft dir zusätzlich, wenn du auch Eneretisch Heilen möchtest. Ich erstelle diese von Hand, weil ich das persönliche noch mag. Für dich bedeutet das, dass du dich besser und schneller kennen lernen kannst.';
                                                } else {
                                                    $text = 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust, dann bestelle gerne einen Gutschein bei mir. Das ist doch einmal ein Herzensgutschein.';
                                                }
                                                $shortText = strlen($text) > 150 ? substr($text, 0, 150) . '...' : $text;
                                            @endphp
                                            <span class="short-text">{{ $shortText }}</span>
                                            <span class="full-text" style="display: none;">{{ $text }}</span>
                                        </div>
                                        <a href="#" class="text-primary show-more-link">Mehr anzeigen</a>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            @if($index == 1)
                                                Bei Verfügbarkeit benachrichtigen
                                            @else
                                                In den Warenkorb
                                            @endif
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
    </div>
    <!--end::Pricing Section-->
</x-landing-layout>

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