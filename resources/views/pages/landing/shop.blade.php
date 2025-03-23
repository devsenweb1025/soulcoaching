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
                    {{-- <span id="kt_landing_hero_text"></span> --}}
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
    <div class="mt-sm-n20 position-relative mt-20 mb-20">
        <div class="clouds-4" style="background-size: contain"></div>
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
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/1.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Ritualkerze - Abschiedskerze</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 28,90</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Vielleicht ist dein Herzenstier über
                                            die Regenbogenbrücke gegangen, oder aber auch ein geliebter Mensch hat
                                            diesen Planeten verlassen. Diese Kerze kannst du als Ritualkerze nehmen, um
                                            deinem verstorbenen zur Seite zu stehen. Zünde eine Kerze für seinen Weg und
                                            für deine Seele an. Bei jeder Kerze erhältst du noch einen kleinen
                                            persönlichen Code, welchen ich für dich erstelle.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            Bei Verfügbarkeit benachrichtigen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/2.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold"> Ritual - Herzensöffner</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 24,90</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Wir denken, dass unser Hirn uns leitet, aber in Wirklichkeit ist es unser
                                            Herz, welches uns den Weg weist. Vielleicht hörst du die feine Stimme gerade
                                            nicht, dann zünde diese Kerze an und dein Herz spürt deine wohlige Wärme und
                                            spricht zu dir. Du bekommst eine gechannelte Nachricht im Paket.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/3.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Ritual - Aurareinigung</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 24,90</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Die Aura ist dein persönliches Energiefeld. Als Ritual kannst du sie täglich
                                            durch Räucherware reinigen und du kannst zusätzlich diese Kerze zur
                                            Reinigung deiner Aura anzünden. Lass das Licht in dir gross werden. Zu
                                            dieser Kerze erhälst du eine Info über dich, welche ich für dich Channele.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Pricing-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                            data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/4.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Ritualkerze - Vollmond</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 24,90</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Der Vollmond hat einige Kräfte die du in diesem Leben für dich Nutzen
                                            kannst. Nebst Ritualen und Ritus kannst du das ganze mit der Vollmondkerze
                                            verstärken indem du sie bei Vollmond anzündest. Möge dein Leben nach deiner
                                            Vorstellungs- und Gedankenkraft verlaufen. Bei jeder Kerze erhältst du noch
                                            einen kleinen persönlichen Code, welchen ich für dich erstelle.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/5.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Ritual - Neumond</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 24,90</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Der Vollmond hat einige Kräfte die du in diesem Leben für dich Nutzen
                                            kannst. Nebst Ritualen und Ritus kannst du das ganze mit der Vollmondkerze
                                            verstärken indem du sie bei Vollmond anzündest. Möge dein Leben nach deiner
                                            Vorstellungs- und Gedankenkraft verlaufen. Bei jeder Kerze erhältst du noch
                                            einen kleinen persönlichen Code, welchen ich für dich erstelle.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/6.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Energetisches Räumereinigen</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 40,00</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Egal, ob an deinem Arbeitsplatz oder in deinem gemütlichen Zuhause. Alle
                                            Energien werden an Orten gesammelt. Eine Energetisierende Reinigung lohnt
                                            sich also täglich, wöchenltich oder monatlich, um die Energien wieder zu
                                            neutralisieren. Du bekommst ein PDF von mir persönlich wie die Reinigung zur
                                            Magie wird.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Pricing-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/7.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Palo Santo</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 4,50</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Palo Santo ist - wie es schon der Name sagt - das Âheilige Holz"
                                            Südamerikas, vergleichbar mit Sandelholz in Indien. Es wächst hauptsächlich
                                            in Peru. Die Peruaner glauben, dass ihr Palo Santo starke Kräfte hat -
                                            immerhin gedeiht es auch auf sehr kargen Böden.


                                            Es hat die Kraft negative Energien zu vertreiben und ist ein starker
                                            Atmosphärenreiniger. Der Geist entspannt und öffnet sich für höhere Sphären.
                                            Ein heiliger Raum entsteht für innere Entfaltung, Meditation und Rituale.
                                            Eine neue Leichtigkeit breitet sich aus und lässt Sorgen und Probleme
                                            verschwinden.


                                            Palo Santo ist sehr reichhaltig an ätherischen Ölen und duftet wundervoll
                                            aromatisch, mandelartig mit einem Hauch von Kokos.
                                            Unsere Palo Santo Räucherstäbchen werden aus 100% natürlichen Substanzen
                                            hergestellt. Der Anteil an Palo Santo Holz und Palo Santo Öl ist sehr hoch.
                                            Das verwendete Palo Santo stammt direkt aus Peru. Die hochwertige Paste wird
                                            von Hand auf ein Bambusstäbchen aufgerollt und liebevoll an der Sonne
                                            getrocknet.

                                            Unsere Palo Santo Räucherstäbchen werden aus 100% natürlichen Substanzen
                                            hergestellt.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/8.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Räucherstäbchen - Engel der Fülle</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 5,50</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Egal, um welche Art Fülle es sich handelt. Ob Finanzen, Gesundheit,
                                            Beziehungen oder eine andere Fülle. Dieses Räucherstäbchen zieht den Engel
                                            der Fülle an und verhilft dir in deiner Thematik dazu es in die 3D Welt zu
                                            bekommen. Du bekommst eine Engelskarte und einen Füllecodevon mir persönlich
                                            dazu.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/9.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Räucherstäbchen - Engel der Liebe</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 5,50</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Engel wünschen sich für uns nur das Beste. Egal ob du gerade deine
                                            Selbstliebe oder die grosse Liebe entdecken willst, dieses Räucherstäbchen
                                            verhilft dir zu dem zu kommen. Lass den Engelsduft der Liebe dich umgeben.
                                            Zu diesen Räucherstäbchen erhältst du eine Engelsbotschaft und ein
                                            Liebescode von mir persönlich.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Pricing-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/10.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Räucherstäbchen - Engel des Vertrauens
                                        </h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 5,50</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Vertrauen ist ein Grundkonstrukt für dein Leben. Egal, ob es sich um
                                            Selbst-Vertrauen handelt oder darum anderen zu vertrauen. Lass deinen
                                            persönlichen Engel der dafür zuständig ist in deine Räume, damit er dich
                                            beim Vertrauen unterstützen kann. Zu dieser Bestellung erhältst du von mir
                                            eine Engelsbotschaft und ein Vertrauenscode.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/11.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Kartenset - Engel der Neuzeit</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 30,90</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Als du dich entschieden hast noch einmal auf diesen Planten zu kommen und
                                            erneut deine Seele lernen zu lassen, warst du wirklich mutig. Im 2025 und
                                            die kommenden Jahre wird sich die Welt verändern. Finde dein Inneres Licht
                                            und nutze das Kartenset für dich, wenn du den Mut kurzfristig verlierst
                                            weiter zu machen.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/12.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Dein Persönlicher Seelencode</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 120,00</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Mit deinem Seelencode erfährst du nochmals genau, mit welchen Stärken und
                                            Schwächen du geboren wurdest. Denn dein Geburtsdatum sagt das unter anderem
                                            aus.

                                            Du erfährst dadurch, was du als Talente bekommen hast oder auch welche
                                            Herausforderungen dir dein Code gegeben hat.

                                            Dein Seelencode hilft dir zusätzlich, wenn du auch Eneretisch Heilen
                                            möchtest.

                                            Ich erstelle diese von Hand, weil ich das persönliche noch mag. Für dich
                                            bedeutet das, dass du dich besser und schneller kennen lernen kannst.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Pricing-->
                    <!--begin::Pricing-->
                    <div class="row g-5">
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/13.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Herzens Gutschein
                                        </h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 80,00</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du
                                            jemandem auch noch etwas Gutes tust, dann bestelle gerne einen Gutschein bei
                                            mir. Das ist doch einmal ein Herzensgutschein.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/14.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Herzens Gutschein</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 50,00</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du
                                            jemandem auch noch etwas Gutes tust, dann bestelle gerne einen Gutschein bei
                                            mir. Das ist doch einmal ein Herzensgutschein.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="500">
                            <div class="card card-stretch shadow card-borderless mb-5">
                                <div class="card-header py-10">
                                    <div class="w-100 h-250px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset(theme()->getMediaUrlPath() . 'landing/products/15.webp') }})">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="mb-7 text-start">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-5 fw-bold">Herzens Gutschein</h1>
                                        <!--end::Title-->
                                        <!--begin::Price-->
                                        <div class="text-start">
                                            {{-- <span class="mb-2 text-primary">CHF</span> --}}
                                            <span class="fs-2 fw-bold text-primary">CHF 120,00</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Features-->
                                    <div class="w-100">
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du
                                            jemandem auch noch etwas Gutes tust, dann bestelle gerne einen Gutschein bei
                                            mir. Das ist doch einmal ein Herzensgutschein.
                                        </div>
                                    </div>
                                    <!--end::Features-->
                                </div>
                                <div class="card-footer">
                                    <div class="card-toolbar text-center">
                                        <button type="button" class="btn btn-primary">
                                            In den Warenkorb
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
