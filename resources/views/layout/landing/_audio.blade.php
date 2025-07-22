<!--begin::Audio Section-->
<div class="position-fixed bottom-0 start-0 z-index-3" style="left: 14px; bottom: 14px;">
    <div style="position: relative; display: flex; flex-direction: column; align-items: center;">
        <svg width="90" height="50" viewBox="0 0 90 50" style="position: absolute; top: -30px; left: 75%; transform: translateX(-50%); pointer-events: none; z-index: 2;">
          <defs>
            <path id="circlePath"
              d="M 15,40 A 30,30 0 0,1 75,40" />
          </defs>
          <text font-size="10" fill="#222" font-family="inherit" text-anchor="middle">
            <textPath xlink:href="#circlePath" startOffset="50%">
              Seelenklang starten
            </textPath>
          </text>
        </svg>
        <button id="audioToggle" class="btn btn-icon position-relative bg-primary rounded-circle">
            <!-- Satellite icon (shown when playing) -->
            {!! theme()->getIcon('notification-on', 'fs-3tx text-white audio-playing-icon d-none', 'solid') !!}
            <!-- Muted icon (shown when stopped) -->
            {!! theme()->getIcon('notification-bing', 'fs-3tx text-white audio-muted-icon', 'solid') !!}
        </button>
    </div>
</div>
<!--end::Audio Section-->

<audio id="backgroundAudio" loop>
    <source src="{{ asset(theme()->getMediaUrlPath() . 'audio/background.mp3') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<style>
    #audioToggle {
        left: 14px;
        bottom: 14px;
        width: 54px;
        height: 54px;
    }
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
                    playingIcon.classList.remove('d-none');
                    mutedIcon.classList.add('d-none');
                    playingIcon.classList.add('zoom-animation');
                } else {
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
