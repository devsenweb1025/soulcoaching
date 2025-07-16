<style>
    #newsletter-popup {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    #newsletter-popup.show {
        opacity: 1;
    }

    .popup-box {
        background: white;
        padding: 24px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        max-width: 420px;
        width: 90%;
        position: relative;
        text-align: center;
        transform: translateY(-20px);
        transition: transform 0.3s ease;
    }

    #newsletter-popup.show .popup-box {
        transform: translateY(0);
    }

    .popup-box h2 {
        font-family: 'Cinzel', serif;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .popup-box p {
        font-size: 14px;
        color: #555;
        margin-bottom: 16px;
    }

    .popup-box .field-title {
        font-size: 14px;
        font-weight: normal;
        text-align: left;
        margin: 10px 0 5px;
        font-family: 'Archivo', sans-serif;
    }

    .popup-box input[type="email"],
    .popup-box input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border-radius: 25px;
        border: 1px solid #ccc;
        text-align: center;
        font-size: 14px;
    }

    .popup-box .datefield {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 12px;
    }

    .popup-box .datefield input {
        width: 60px;
        border-radius: 10px;
    }

    .popup-box .checkbox {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .popup-box .note {
        font-size: 12px;
        color: #777;
        margin-bottom: 15px;
    }

    .popup-box button[type="submit"] {
        background-color: #a357d4;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s ease;
        width: 100%;
    }

    .popup-box button[type="submit"]:hover {
        background-color: #933cc5;
    }

    .popup-box .dismiss {
        margin-top: 12px;
        font-size: 14px;
        color: #000;
        text-decoration: underline;
        background: none;
        border: none;
        cursor: pointer;
    }

    .popup-box .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        cursor: pointer;
        background: none;
        border: none;
    }

    .popup-box img.logo {
        width: 60px;
        margin-bottom: 20px;
    }

    #thankyou-message {
        display: none;
        padding-top: 10px;
        color: #333;
        font-size: 15px;
    }

    .error-message {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        display: none;
    }
</style>

<div id="newsletter-popup">
    <div class="popup-box">
        <button class="close-btn" onclick="closeNewsletterPopup()">×</button>
        <img src="{{ asset('media/logos/landing.png') }}" alt="Logo" class="logo" />

        <h2 id="popup-title">Newsletter</h2>
        <p id="popup-text">Melde dich an und profitiere von<br>Rabatten und weiteren Aktionen!</p>

        <form id="newsletter-form" onsubmit="submitNewsletterForm(event)">
            <div class="field-title">Mailadresse *</div>
            <input type="email" name="email" placeholder="Deine Mailadresse" required />
            <div class="error-message" id="email-error"></div>

            <div class="field-title">Geburtsdatum *</div>
            <div class="datefield">
                <input class="birthday" type="text" pattern="[0-9]*" placeholder="MM" size="2" maxlength="2"
                    name="birthday_month" required />
                <input class="birthday" type="text" pattern="[0-9]*" placeholder="DD" size="2" maxlength="2"
                    name="birthday_day" required />
            </div>
            <div class="error-message" id="birthday-error"></div>

            <label class="checkbox">
                <input type="checkbox" name="consent" required />
                <span>Ich bin einverstanden mit dem Newsletter-Abo</span>
            </label>
            <div class="error-message" id="consent-error"></div>

            <div class="note">* Erforderliches Feld</div>

            <button type="submit">Jetzt anmelden</button>
        </form>

        <div id="thankyou-message">
            <h2 style="font-family: 'Cinzel', serif; font-size: 22px; margin-bottom: 10px;">Vielen Dank!</h2>
            <p style="font-size: 14px; color: #555; margin-bottom: 20px;">
                Hiermit bestätigen wir deine Anmeldung für den Newsletter.<br>
                Du bleibst jetzt über alle Aktionen informiert.
            </p>
        </div>

        <button class="dismiss" onclick="closeNewsletterPopup()">Fenster schliessen</button>
    </div>
</div>

<script>
    function showNewsletterPopup() {
        const popup = document.getElementById('newsletter-popup');
        popup.style.display = 'flex';
        setTimeout(() => popup.classList.add('show'), 60000);
    }

    function closeNewsletterPopup() {
        const popup = document.getElementById('newsletter-popup');
        popup.classList.remove('show');
        setTimeout(() => popup.style.display = 'none', 300);
    }

    async function submitNewsletterForm(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        // Reset error messages
        document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

        try {
            const response = await fetch('/api/newsletter/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    email: formData.get('email'),
                    birthday_month: formData.get('birthday_month'),
                    birthday_day: formData.get('birthday_day'),
                    consent: formData.get('consent') === 'on'
                })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Ein Fehler ist aufgetreten');
            }

            // Show success message
            form.style.display = 'none';
            document.getElementById('popup-title').style.display = 'none';
            document.getElementById('popup-text').style.display = 'none';
            document.getElementById('thankyou-message').style.display = 'block';

        } catch (error) {
            // Show error message
            const errorElement = document.getElementById('email-error');
            errorElement.textContent = error.message;
            errorElement.style.display = 'block';
        }
    }

    // Show popup after 5 seconds
    setTimeout(showNewsletterPopup, 5000);
</script>