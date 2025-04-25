<!--begin::Live Chat Section-->
<div class="position-fixed bottom-0 end-0 z-index-3">
    <!-- Live Chat Box -->
    <div id="liveChatBox" class="card shadow-lg mb-5 me-5 d-none" style="width: 300px;">
        <div class="card-header">
            <div class="card-title">
                <h3 class="fw-bold text-gray-800">Kontakt & Zahlung</h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" id="closeChatBox">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column gap-5">
                <!-- Contact Button -->
                <a href="mailto:info@seelen-fluesterin.ch" class="btn btn-primary w-100">
                    <i class="ki-duotone ki-message-text-2 fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Kontakt per E-Mail
                </a>

                <!-- Payment Buttons -->
                <div class="d-flex flex-column gap-3">
                    <button type="button" class="btn btn-light-primary w-100" id="twintPaymentBtn">
                        <i class="ki-duotone ki-abstract-26 fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Mit TWINT bezahlen
                    </button>

                    <button type="button" class="btn btn-light-primary w-100" id="stripePaymentBtn">
                        <i class="ki-duotone ki-credit-cart fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Mit Karte bezahlen
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Button -->
    <button id="liveChatToggle" class="btn btn-icon position-relative bg-primary rounded-circle">
        <!-- Chat icon (shown when closed) -->
        {!! theme()->getIcon('message-text', 'fs-2tx text-white live-chat-open', 'solid') !!}
        <!-- Close icon (shown when open) -->
        {!! theme()->getIcon('cross', 'fs-2tx text-white live-chat-close d-none', 'solid') !!}
    </button>
</div>
<!--end::Live Chat Section-->

<style>
    #liveChatToggle {
        right: 14px;
        bottom: 14px;
        width: 54px;
        height: 54px;
    }

    #liveChatBox {
        position: fixed;
        right: 0px;
        bottom: 70px;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .live-chat-open {
        display: inline-block;
    }

    .live-chat-close {
        display: none;
    }

    #liveChatBox.show {
        display: block !important;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatToggle = document.getElementById('liveChatToggle');
        const chatBox = document.getElementById('liveChatBox');
        const closeChatBox = document.getElementById('closeChatBox');
        const twintPaymentBtn = document.getElementById('twintPaymentBtn');
        const stripePaymentBtn = document.getElementById('stripePaymentBtn');

        // Toggle chat box
        chatToggle.addEventListener('click', function() {
            chatBox.classList.toggle('d-none');
            chatBox.classList.toggle('show');

            // Toggle icons
            const openIcon = document.querySelector('.live-chat-open');
            const closeIcon = document.querySelector('.live-chat-close');
            openIcon.classList.toggle('d-none');
            closeIcon.classList.toggle('d-none');
        });

        // Close chat box
        closeChatBox.addEventListener('click', function() {
            chatBox.classList.add('d-none');
            chatBox.classList.remove('show');

            // Reset icons
            document.querySelector('.live-chat-open').classList.remove('d-none');
            document.querySelector('.live-chat-close').classList.add('d-none');
        });

        // Handle TWINT payment
        twintPaymentBtn.addEventListener('click', function() {
            // Add your TWINT payment logic here
            Swal.fire({
                title: 'TWINT Zahlung',
                text: 'Sie werden zur TWINT Zahlung weitergeleitet...',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Weiter',
                cancelButtonText: 'Abbrechen'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to TWINT payment
                    window.location.href = '/payment/twint';
                }
            });
        });

        // Handle Stripe payment
        stripePaymentBtn.addEventListener('click', function() {
            // Add your Stripe payment logic here
            Swal.fire({
                title: 'Kartenzahlung',
                text: 'Sie werden zur Kartenzahlung weitergeleitet...',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Weiter',
                cancelButtonText: 'Abbrechen'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to Stripe payment
                    window.location.href = '/payment/stripe';
                }
            });
        });
    });
</script>