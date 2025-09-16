<div class="position-relative">
    <!--begin::Testimonials Section-->
    <div class="mt-20 mb-20 position-relative z-index-1">
        <!--begin::Container-->
        <div class="container">
            <div class="card shadow-sm bg-gray-300" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500"
                data-aos-delay="0">
                <div class="card-body">

                    <div class="card-title d-flex flex-column align-items-center text-center mt-20 mb-10"
                        data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="0">
                        <div class="header-title fs-4x font-cinzel">Resonierst du mit meiner Art, <br>wie ich arbeite?
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="row justify-content-center">
                        @php
                            $cards = [
                                [
                                    'icon' => 'lovely',
                                    'title' => 'Hohe Empathie',
                                    'description' =>
                                        'Durch meine Hochsensibilität und die Herausforderungen, die mir das Leben selbst geschenkt hat, spüre ich feinfühlig, was zwischen den Zeilen liegt – unausgesprochene Gefühle, tiefe Sehnsüchte, innere Blockaden. Ich begegne dir mit echtem Verständnis, Achtsamkeit und einem offenen Herzen, das dich wirklich sieht. Gemeinsam schaffen wir einen Raum der Heilung und tiefen Transformation, in dem du dich sicher und gehalten fühlen darfst. Lass uns deine inneren Schätze freilegen und Schritt für Schritt das Leben gestalten, das deiner Seele entspricht.',
                                    'delay' => '500',
                                ],
                                [
                                    'icon' => 'setting-2',
                                    'title' => 'Persönlichkeitsentwicklung',
                                    'description' =>
                                        'Mit über 10 Jahren Erfahrung in der Persönlichkeitsentwicklung unterstütze ich dich, Blockaden zu überwinden und dein Potenzial zu entfalten. Du sparst Zeit, weil du konkrete Methoden und Expertenwissen für deine Transformation erhältst.',
                                    'delay' => '700',
                                ],
                                [
                                    'icon' => 'pulse',
                                    'title' => 'Ganzheitliche Betrachtungsweise',
                                    'description' =>
                                        'Mit meiner ganzheitlichen Betrachtungsweise die die fünf Bewusstseinsebenen – Körper, Geist, Emotionen, Energie und Seele – integriert, erhältst du einen umfassenden Zugang zu deinen inneren Blockaden. Dadurch kannst du nicht nur gezielte Lösungen finden, sondern auch dein volles Potenzial entfalten und ein harmonisches Leben führen. Erlebe, wie sich dein Leben auf allen Ebenen positiv verändert!',
                                    'delay' => '500',
                                ],
                                [
                                    'icon' => 'parcel',
                                    'title' => 'Viel Lebenserfahrung',
                                    'description' =>
                                        'Jede Herausforderung, die ich gemeistert habe, hat mich geprägt und mir tiefgehende Einsichten in das Leben und seine Höhen und Tiefen gegeben. Ich kenne die Momente des Fallens und das kraftvolle Gefühl des Wiederaufstehens. Diese Erfahrungen ermöglichen es mir, einfühlsam auf deine Bedürfnisse einzugehen und dich im Prozess der Blockadenlösung zu unterstützen.',
                                    'delay' => '600',
                                ],
                                [
                                    'icon' => 'medal-star',
                                    'title' => 'Medialität',
                                    'description' =>
                                        'Als mediale Beraterin empfange ich feinstoffliche Energien und Botschaften, die dir Klarheit und neue Orientierung in deinem Leben schenken. Meine Gabe erlaubt es mir, genau die Impulse zu setzen, die deine unbewussten Blockaden sanft lösen und eine tiefgreifende Transformation ermöglichen – damit du wieder frei und mit Leichtigkeit deinen Weg gehen kannst.Vertraue meiner Medialität und erlebe, wie sich dein Leben in eine kraftvolle Transformation wandeln darf.',
                                    'delay' => '700',
                                ],
                            ];
                        @endphp

                        @foreach ($cards as $card)
                            <!--begin::Col-->
                            <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500" data-aos-delay="{{ $card['delay'] }}">
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
