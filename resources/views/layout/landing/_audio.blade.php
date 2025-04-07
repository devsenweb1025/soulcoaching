<!--begin::Audio Section-->
<div class="position-fixed bottom-0 start-0 mb-5 me-5 mx-5 z-index-2">
    <button id="audioToggle" class="btn btn-icon position-relative">
        <!-- Satellite icon (shown when playing) -->
        {!! theme()->getIcon('notification-on', 'fs-2tx text-primary audio-playing-icon d-none') !!}
        <!-- Muted icon (shown when stopped) -->
        {!! theme()->getIcon('notification-bing', 'fs-2tx text-primary audio-muted-icon') !!}
    </button>
</div>
<!--end::Audio Section-->

<audio id="backgroundAudio" loop>
    <source src="{{ asset(theme()->getMediaUrlPath() . 'audio/welcome.m4a') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

@push('scripts')
<script>
    window.onload = function() {
        var context = new AudioContext();
    }
    document.addEventListener('DOMContentLoaded', function() {
        const audio = document.getElementById('backgroundAudio');
        const audioToggle = document.getElementById('audioToggle');
        const playingIcon = audioToggle.querySelector('.audio-playing-icon');
        const mutedIcon = audioToggle.querySelector('.audio-muted-icon');
        let isPlaying = false;

        // Function to save audio state to localStorage
        function saveAudioState(state) {
            localStorage.setItem('audioEnabled', state);
        }

        // Function to load audio state from localStorage
        function loadAudioState() {
            return localStorage.getItem('audioEnabled') === 'true' || localStorage.getItem('audioEnabled') === null;
        }

        // Function to update UI based on playing state
        function updateUI(playing) {
            if (playing) {
                audioToggle.classList.remove('btn-active-light-primary');
                audioToggle.classList.add('btn-active-primary');
                playingIcon.classList.remove('d-none');
                mutedIcon.classList.add('d-none');
                playingIcon.classList.add('zoom-animation');
            } else {
                audioToggle.classList.remove('btn-active-primary');
                audioToggle.classList.add('btn-active-light-primary');
                playingIcon.classList.add('d-none');
                mutedIcon.classList.remove('d-none');
                mutedIcon.classList.remove('zoom-animation');
            }
        }

        // Function to start playing audio
        function startPlaying() {
            audio.play().then(() => {
                isPlaying = true;
                updateUI(true);
                saveAudioState(true);
            }).catch(error => {
                console.log('Playback failed:', error);
                isPlaying = false;
                updateUI(false);
                saveAudioState(false);
            });
        }

        // Function to stop playing audio
        function stopPlaying() {
            audio.pause();
            isPlaying = false;
            updateUI(false);
            saveAudioState(false);
        }

        // Function to toggle audio
        function toggleAudio() {
            if (isPlaying) {
                stopPlaying();
            } else {
                startPlaying();
            }
        }

        // Function to stop background music
        function stopBackgroundMusic() {
            if (isPlaying) {
                stopPlaying();
            }
        }

        // Monitor all audio and video elements on the page
        function setupMediaMonitoring() {
            // Get all audio and video elements except our background audio
            const mediaElements = document.querySelectorAll('audio:not(#backgroundAudio), video');

            mediaElements.forEach(element => {
                // Listen for play event
                element.addEventListener('play', () => {
                    stopBackgroundMusic();
                });

                // Listen for playing event (for cases where play event might not fire)
                element.addEventListener('playing', () => {
                    stopBackgroundMusic();
                });
            });

            // Monitor for dynamically added audio/video elements
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    mutation.addedNodes.forEach((node) => {
                        if (node.nodeName === 'AUDIO' || node.nodeName === 'VIDEO') {
                            if (node.id !== 'backgroundAudio') {
                                node.addEventListener('play', stopBackgroundMusic);
                                node.addEventListener('playing', stopBackgroundMusic);
                            }
                        }
                    });
                });
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        }

        // Add click event listener to toggle button
        audioToggle.addEventListener('click', toggleAudio);

        // Handle audio ended event
        audio.addEventListener('ended', function() {
            stopPlaying();
        });

        // Initialize media monitoring
        setupMediaMonitoring();

        // Check localStorage and start playing if previously enabled
        if (loadAudioState()) {
            startPlaying();
        }
    });
</script>
@endpush

<style>
    .zoom-animation {
        animation: zoomPulse 1.5s infinite;
    }

    @keyframes zoomPulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.4);
        }
        100% {
            transform: scale(1);
        }
    }
</style>
