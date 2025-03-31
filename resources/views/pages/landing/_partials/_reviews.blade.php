<div class="position-relative z-index-2">
    <div class="clouds-3"></div>
    <!--begin::Google Reviews Section-->
    <div class="mt-20 z-index-1 container z-index-2">
        @if(isset($googleReviews) && $googleReviews['success'])
            <!--begin::Curve top-->
            <div class="landing-curve landing-light-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <div class="py-20 landing-light-bg rounded position-relative z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Plans-->
                    <div class="d-flex flex-column container">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <div class="mb-7">
                                <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/google-logo.png') }}" alt="Google"
                                    height="50">
                            </div>
                            <div class="d-flex flex-center mb-5">
                                <div class="fs-2hx fw-bold">{{ number_format($googleReviews['rating'], 1) }}</div>
                                <div class="d-flex align-items-center ms-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star fs-2 {{ $i <= $googleReviews['rating'] ? 'text-warning' : 'text-gray-300' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="text-gray-600 fw-semibold fs-5 mb-7">
                                Basierend auf {{ $googleReviews['total_reviews'] }} Google Bewertungen
                            </div>
                            <!-- Add Review Button -->
                            <a href="https://g.co/kgs/7qrDf5L"
                               class="btn btn-primary px-6 py-3"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="fas fa-pencil-alt me-2"></i>
                                Bewerte Seelenfluesterin auf Google
                            </a>
                        </div>
                        <!--end::Heading-->

                        @if(!empty($googleReviews['reviews']))
                            <div class="tns tns-default" style="direction: ltr" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500" data-aos-delay="0">
                                <!--begin::Slider-->
                                <div data-tns="true" data-tns-loop="false" data-tns-swipe-angle="false" data-tns-speed="1000"
                                    data-tns-autoplay="true" data-tns-autoplay-timeout="10000" data-tns-controls="true"
                                    data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                                    data-tns-slide-by="1" data-tns-responsive="{768:{items:1},992:{items: 2},1200:{items: 3}}"
                                    data-tns-prev-button="#kt_team_slider_prev_google"
                                    data-tns-next-button="#kt_team_slider_next_google">

                                    @foreach($googleReviews['reviews'] as $review)
                                    <!--begin::Item-->
                                    <div class="px-5 py-5">
                                        <div class="card card-stretch card-shadow card-borderless mb-5 bg-gray-300">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <div class="card-toolbar">
                                                    <div class="d-flex align-items-center">
                                                        <!-- Avatar -->
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="{{ $review['profile_photo_url'] }}" class="" alt="{{ $review['author_name'] }}" />
                                                        </div>
                                                        <!-- Name and Date -->
                                                        <div
                                                            class="d-flex flex-column align-items-start border-0 border-left-2 border-dotted border-gray-600 px-2">
                                                            <div class="fs-3">{{ $review['author_name'] }}</div>
                                                            <div class="fs-6 text-gray-600">{{ $review['relative_time_description'] }}</div>
                                                        </div>
                                                    </div>
                                                    <!-- Rating -->
                                                    <div class="d-flex align-items-center mt-3">
                                                        <div class="rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="fas fa-star {{ $i <= $review['rating'] ? 'text-warning' : 'text-gray-300' }}"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="fs-3 mt-5">
                                                    <div class="review-text" role="region" aria-label="Review text">
                                                        <div id="short-text-{{ $loop->index }}"
                                                             class="review-short-text"
                                                             tabindex="0">
                                                            {{ $review['short_text'] }}
                                                        </div>
                                                        <div id="full-text-{{ $loop->index }}"
                                                             class="review-full-text d-none"
                                                             tabindex="0">
                                                            {{ $review['text'] }}
                                                        </div>
                                                    </div>
                                                    @if($review['has_more'])
                                                        <button type="button"
                                                                id="toggle-btn-{{ $loop->index }}"
                                                                class="text-primary border-0 bg-transparent mt-3 review-toggle-btn"
                                                                onclick="toggleReviewText('{{ $loop->index }}')"
                                                                aria-expanded="false"
                                                                aria-controls="full-text-{{ $loop->index }}">
                                                            Mehr anzeigen
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    @endforeach
                                </div>
                                <!--end::Slider-->

                                <!--begin::Slider button-->
                                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev_google">
                                    <span class="svg-icon fs-3x">
                                        {!! theme()->getIcon('arrow-left', 'fs-1 text-gray-800') !!}
                                    </span>
                                </button>
                                <!--end::Slider button-->

                                <!--begin::Slider button-->
                                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next_google">
                                    <span class="svg-icon fs-3qx">
                                        {!! theme()->getIcon('arrow-right', 'fs-1 text-gray-800') !!}
                                    </span>
                                </button>
                                <!--end::Slider button-->
                            </div>
                        @else
                            <div class="text-center text-gray-600 fs-5">
                                Keine Bewertungen verfügbar.
                            </div>
                        @endif
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
        @else
            <div class="py-20 landing-light-bg rounded position-relative z-index-2">
                <div class="container">
                    <div class="text-center text-gray-600 fs-5">
                        @if(isset($googleReviews['error']))
                            Es gab ein Problem beim Laden der Google Bewertungen.
                        @else
                            Google Bewertungen werden geladen...
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!--end::Google Reviews Section-->

    <!--begin::Services Section-->
    <div class="mt-20 z-index-1 container z-index-2">
        <!--begin::Curve top-->
        <div class="landing-curve landing-light-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-light-bg rounded position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bold mb-5 font-cinzel" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Was meine Kunden sagen</h1>
                        <div class="text-gray-600 fw-semibold fs-5">
                            Bilde dir eine Meinung anhand der vielen positiven Rezensionen.
                        </div>
                    </div>
                    <!--end::Heading-->

                    <div class="tns tns-default" style="direction: ltr" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="500" data-aos-delay="0">
                        <!--begin::Slider-->
                        <div data-tns="true" data-tns-loop="false" data-tns-swipe-angle="false"
                            data-tns-speed="1000" data-tns-autoplay="true" data-tns-autoplay-timeout="10000"
                            data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false"
                            data-tns-dots="false" data-tns-slide-by="1"
                            data-tns-responsive="{768:{items:1},992:{items: 2},1200:{items: 3}}"
                            data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">

                            <!--begin::Item-->
                            <div class="px-5 py-5">
                                <div class="card card-stretch card-shadow card-borderless mb-5 bg-gray-300 h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="fs-3">
                                            „Deine klaren Worte und deine sanfte Art haben mir geholfen, die Dinge
                                            klarer zu
                                            sehen.
                                            Die Rückführung war sehr hilfreich, um zu erkennen, was meine Aufgabe auf
                                            der
                                            Erde
                                            ist.“
                                        </div>

                                        <div class="card-toolbar text-center">
                                            <div
                                                class="d-flex flex-column align-items-start border-0 border-left-2 border-dotted border-gray-600 px-2 my-5">
                                                <div class="fs-3">Priska</div>
                                                <div class="fs-6 text-gray-600">St. Gallen</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <audio controls class="w-100">
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                        type="audio/mpeg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                        type="audio/ogg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                        type="audio/wav" />
                                                    Audio not supported
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="px-5 py-5">
                                <div class="card card-stretch card-shadow card-borderless mb-5 bg-gray-300 h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="fs-3">
                                            „Anfangs war ich ein wenig nervös, aber du hast mich immer gut begleitet und
                                            alles
                                            erklärt, was du getan hast. Das hat mir ermöglicht, loszulassen. Ich freue
                                            mich
                                            schon sehr auf die nächste Behandlung.“
                                        </div>

                                        <div class="card-toolbar text-center">
                                            <div
                                                class="d-flex flex-column align-items-start border-0 border-left-2 border-dotted border-gray-600 px-2 my-5">
                                                <div class="fs-3">Ana</div>
                                                <div class="fs-6 text-gray-600">Zentralschweiz</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <audio controls class="w-100">
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                        type="audio/mpeg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                        type="audio/ogg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                        type="audio/wav" />
                                                    Audio not supported
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="px-5 py-5">
                                <div class="card card-stretch card-shadow card-borderless mb-5 bg-gray-300 h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="fs-3">
                                            „Deine klaren Worte und deine sanfte Art haben mir geholfen, die Dinge
                                            klarer zu
                                            sehen.
                                            Die Rückführung war sehr hilfreich, um zu erkennen, was meine Aufgabe auf
                                            der
                                            Erde
                                            ist.“
                                        </div>

                                        <div class="card-toolbar text-center">
                                            <div
                                                class="d-flex flex-column align-items-start border-0 border-left-2 border-dotted border-gray-600 px-2 my-5">
                                                <div class="fs-3">Marion</div>
                                                <div class="fs-6 text-gray-600">Zürich</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <audio controls class="w-100">
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                        type="audio/mpeg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                        type="audio/ogg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                        type="audio/wav" />
                                                    Audio not supported
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="px-5 py-5">
                                <div class="card card-stretch card-shadow card-borderless mb-5 bg-gray-300 h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="fs-3">
                                            „Anfangs war ich ein wenig nervös, aber du hast mich immer gut begleitet und
                                            alles
                                            erklärt, was du getan hast. Das hat mir ermöglicht, loszulassen. Ich freue
                                            mich
                                            schon sehr auf die nächste Behandlung.“
                                        </div>

                                        <div class="card-toolbar text-center">
                                            <div
                                                class="d-flex flex-column align-items-start border-0 border-left-2 border-dotted border-gray-600 px-2 my-5">
                                                <div class="fs-3">Ana</div>
                                                <div class="fs-6 text-gray-600">Zentralschweiz</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <audio controls class="w-100">
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                        type="audio/mpeg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                        type="audio/ogg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                        type="audio/wav" />
                                                    Audio not supported
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="px-5 py-5">
                                <div class="card card-stretch card-shadow card-borderless mb-5 bg-gray-300 h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="fs-3">
                                            „Anfangs war ich ein wenig nervös, aber du hast mich immer gut begleitet und
                                            alles
                                            erklärt, was du getan hast. Das hat mir ermöglicht, loszulassen. Ich freue
                                            mich
                                            schon sehr auf die nächste Behandlung.“
                                        </div>

                                        <div class="card-toolbar text-center">
                                            <div
                                                class="d-flex flex-column align-items-start border-0 border-left-2 border-dotted border-gray-600 px-2 my-5">
                                                <div class="fs-3">Ana</div>
                                                <div class="fs-6 text-gray-600">Zentralschweiz</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <audio controls class="w-100">
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                        type="audio/mpeg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                        type="audio/ogg" />
                                                    <source
                                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                        type="audio/wav" />
                                                    Audio not supported
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Slider-->

                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                            <span class="svg-icon fs-3x">
                                {!! theme()->getIcon('arrow-left', 'fs-1 text-gray-800') !!}
                            </span>
                        </button>
                        <!--end::Slider button-->

                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                            <span class="svg-icon fs-3qx">
                                {!! theme()->getIcon('arrow-right', 'fs-1 text-gray-800') !!}
                            </span>
                        </button>
                        <!--end::Slider button-->
                    </div>

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
function toggleReviewText(reviewId) {
    const shortText = document.getElementById(`short-text-${reviewId}`);
    const fullText = document.getElementById(`full-text-${reviewId}`);
    const toggleBtn = document.getElementById(`toggle-btn-${reviewId}`);

    const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

    if (isExpanded) {
        // Show short text
        shortText.classList.remove('d-none');
        fullText.classList.add('d-none');
        toggleBtn.textContent = 'Mehr anzeigen';
        toggleBtn.setAttribute('aria-expanded', 'false');
        shortText.focus();
    } else {
        // Show full text
        shortText.classList.add('d-none');
        fullText.classList.remove('d-none');
        toggleBtn.textContent = 'Weniger anzeigen';
        toggleBtn.setAttribute('aria-expanded', 'true');
        fullText.focus();
    }
}

// Initialize accessibility features
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.review-toggle-btn').forEach(btn => {
        const reviewId = btn.id.replace('toggle-btn-', '');
        const shortText = document.getElementById(`short-text-${reviewId}`);
        const fullText = document.getElementById(`full-text-${reviewId}`);

        if (shortText && fullText) {
            // Set initial states
            shortText.classList.remove('d-none');
            fullText.classList.add('d-none');
            btn.setAttribute('aria-expanded', 'false');
        }
    });
});
</script>

