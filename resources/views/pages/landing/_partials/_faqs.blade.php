<div class="position-relative">
    <div class="clouds-2"></div>
    <!--begin::Testimonials Section-->
    <div class="mt-20 mb-20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <div class="card shadow-sm bg-gray-300" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500"
                data-aos-delay="0">
                <div class="card-body">

                    <div class="card-title d-flex flex-column align-items-center text-center mt-20 mb-10"
                        data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
                        <div class="header-title fs-4x font-cinzel">Meist gestellte Fragen</div>
                        <div class="header-sub fs-2 text-gray-700">Finde schnell Antworten zu deinen Fragen</div>
                    </div>

                    <div class="container">

                        <!--begin::Accordion-->
                        <div class="accordion accordion-solid accordion-icon-collapse" id="kt_accordion_3"
                            data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="1000">
                            @php
                                $faqs = [
                                    [
                                        'question' =>
                                            'Was ist der Unterschied von einem Coaching zu einem spirituellen Coaching?',
                                        'answer' =>
                                            'Mein Coaching ist kein herkömmliches, weil ich mich vor dem Coaching mit deinem System verbinde und dadurch Inputs für dich bekomme. Ausserdem werden wir nicht nur auf Mentaler Ebene arbeiten, sondern beziehen deine Seele immer mit ein. So kommst du schneller und mit Herz an dein Ziel. Alle 5 Bewusstseinsebenen werden eingebaut.',
                                        'is_expanded' => true,
                                    ],
                                    [
                                        'question' => 'Woher weisst du was mein Körper braucht?',
                                        'answer' => 'Durch meine Medialen Fähigkeiten, kann ich deinen Körper auf Energetischer Ebene Scannen und sehe wo du unterstützung benötigst. Teils sagt es mir meine Intuition.',
                                        'is_expanded' => false,
                                    ],
                                    [
                                        'question' => 'Wie funktioniert Tierkommunikation?',
                                        'answer' =>
                                            'Bevor ich mich mit deinem Herzenstier verbinde mache ich diverse Vorbereitungen, dass alles positiv ist und alles zum Besten wohl passieren kann. Danach nehme ich Geistig Kontakt auf und stelle deine Fragen an dein Herzenstier.',
                                        'is_expanded' => false,
                                    ],
                                ];
                            @endphp

                            @foreach ($faqs as $index => $faq)
                                <!--begin::Item-->
                                <div class="mb-5 bg-white rounded px-10 py-5 shadow">
                                    <!--begin::Header-->
                                    <div class="accordion-header py-3 d-flex {{ !$faq['is_expanded'] ? 'collapsed' : '' }} justify-content-between"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#kt_accordion_3_item_{{ $index + 1 }}">
                                        <h3 class="fs-2 fw-semibold mb-0 ms-4">{{ $faq['question'] }}</h3>

                                        <span class="accordion-icon">
                                            {!! theme()->getIcon('down', 'fs-2x accordion-icon-off') !!}
                                            {!! theme()->getIcon('up', 'fs-2x accordion-icon-on') !!}
                                        </span>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="kt_accordion_3_item_{{ $index + 1 }}"
                                        class="fs-3 {{ $faq['is_expanded'] ? 'show' : 'collapse' }} px-10"
                                        data-bs-parent="#kt_accordion_3">
                                        {{ $faq['answer'] }}
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->
                            @endforeach
                        </div>
                        <!--end::Accordion-->
                    </div>

                    <div class="text-center d-flex justify-content-center align-items-center mt-10">
                        {!! theme()->getIcon('directbox-default', 'fs-2x accordion-icon-off') !!}
                        <span class="ms-2">Keine Antwort dabei? Dann melde dich per Kontaktformular</span>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Testimonials Section-->
</div>
