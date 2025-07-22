<!--begin::Audio Section-->
<div class="position-fixed bottom-0 start-0 z-index-3" style="left: 14px; bottom: 14px;">
    <div style="position: relative; display: flex; align-items: center;">
        <button id="audioToggle" class="btn btn-icon position-relative bg-primary rounded-circle">
            <!-- Satellite icon (shown when playing) -->
            {!! theme()->getIcon('notification-on', 'fs-3tx text-white audio-playing-icon d-none', 'solid') !!}
            <!-- Muted icon (shown when stopped) -->
            {!! theme()->getIcon('notification-bing', 'fs-3tx text-white audio-muted-icon', 'solid') !!}
        </button>
        <div class="audio-tooltip" id="audioTooltip">
            Seelenklang starten
        </div>
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
    .audio-tooltip {
        position: absolute;
        left:35px;
        bottom: 20px;
        /* Remove top and translateY for flexbox centering */
        top: auto;
        transform: translateX(-20px);
        opacity: 0;
        pointer-events: none;
        background: #7239eaaa; /* lighter than bg-primary */
        color: white; /* primary text color */
        padding: 8px 16px 8px 36px;
        border-radius: 27px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        font-size: 1rem;
        white-space: nowrap;
        transition: opacity 0.3s, transform 0.3s;
        z-index: -1;
        display: flex;
        align-items: center;
        height: 40px;
    }
    #audioToggle:hover + .audio-tooltip,
    #audioToggle:focus + .audio-tooltip {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
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
            const audioTooltip = document.getElementById('audioTooltip');
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
                    if(audioTooltip) audioTooltip.textContent = 'Mute background music';
                } else {
                    playingIcon.classList.add('d-none');
                    mutedIcon.classList.remove('d-none');
                    mutedIcon.classList.remove('zoom-animation');
                    if(audioTooltip) audioTooltip.textContent = 'Play background music';
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
