<div class="position-relative">
    <div class="clouds-4"></div>
    <!--begin::Testimonials Section-->
    <div class="mt-20 mb-20 position-relative z-index-1">
        <!--begin::Container-->
        <div class="container">
            <div class="card shadow-sm bg-gray-300" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500"
                data-aos-delay="0">
                <div class="card-body">

                    <div class="card-title d-flex flex-column align-items-center text-center mt-20 mb-10"
                        data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="header-title fs-4x font-cinzel">Warum mit mir arbeiten</div>
                        <div class="header-sub fs-2 text-gray-700">
                            Meine Werte, meine Medialität und mein Herzensweg
                            machen meine Arbeit als spirituelle Coachin und energetische Heilerin einzigartig
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        @php
                            $cards = [
                                [
                                    'icon' => 'keyboard',
                                    'title' => 'Herzensmensch',
                                    'description' => 'Ich begegne dir mit Offenheit, Mitgefühl und ehrlicher Präsenz – weil dein Wohl mir am Herzen liegt.',
                                    'delay' => '500'
                                ],
                                [
                                    'icon' => 'rocket',
                                    'title' => 'Harmonie liebend',
                                    'description' => 'Ich kreiere für dich einen Raum der Ruhe, in dem du dich verstanden, sicher und getragen fühlen darfst – sei es im spirituellen Coaching oder in einer energetischen Heilsitzung.',
                                    'delay' => '600'
                                ],
                                [
                                    'icon' => 'setting-2',
                                    'title' => 'Sympatisch',
                                    'description' => 'Meine warme, intuitive Art macht es dir leicht, dich zu öffnen und Vertrauen zu fassen – auch bei sensiblen Themen in der Tierkommunikation oder medialen Beratung.',
                                    'delay' => '700'
                                ],
                                [
                                    'icon' => 'pulse',
                                    'title' => 'Vielseitig interessiert',
                                    'description' => 'Ich sehe dich als einzigartiges Wesen – und richte meine Arbeit individuell auf deine persönlichen, emotionalen und spirituellen Bedürfnisse aus.',
                                    'delay' => '500'
                                ],
                                [
                                    'icon' => 'parcel',
                                    'title' => 'Belesen',
                                    'description' => 'Mein Wissen über energetisches Heilen, spirituelle Prozesse und mediale Methoden wächst stetig – und fließt in jede Sitzung mit ein.',
                                    'delay' => '600'
                                ],
                                [
                                    'icon' => 'medal-star',
                                    'title' => 'Wissbegierig',
                                    'description' => 'Ich bilde mich kontinuierlich weiter, um dir moderne und gleichzeitig tiefgründige Impulse auf deinem Weg anbieten zu können – intuitiv, klar und liebevoll.',
                                    'delay' => '700'
                                ]
                            ];
                        @endphp

                        @foreach ($cards as $card)
                            <!--begin::Col-->
                            <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                                data-aos-delay="{{ $card['delay'] }}">
                                <div class="card shadow h-100">
                                    <div class="card-body">
                                        <a href="#"
                                            class="btn btn-icon btn-light btn-color-primary pulse pulse-primary shadow p-10">
                                            {!! theme()->getIcon($card['icon'], 'fs-2tx text-primary') !!}
                                        </a>
                                        <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                            {{ $card['title'] }}
                                        </h1>
                                        <div class="text-gray-800 fs-4 mb-5">
                                            {{ $card['description'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Col-->
                        @endforeach
                    </div>
                    <!--end::Row-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Testimonials Section-->
</div>
