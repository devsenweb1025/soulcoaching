<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Newsletter Popup</title>
  <link href="https://fonts.googleapis.com/css2?family=Archivo&family=Cinzel:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Archivo', sans-serif;
    }

    #newsletter-popup {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .popup-box {
      background: white;
      padding: 24px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      max-width: 420px;
      width: 90%;
      position: relative;
      text-align: center;
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
  </style>
</head>
<body>

<div id="newsletter-popup" style="display: none;">
  <div class="popup-box">
    <button class="close-btn" onclick="closePopup()">×</button>
    <img src="{{ asset('media/logos/landing.png') }}" alt="Logo" class="logo" />

    <h2 id="popup-title">Newsletter</h2>
    <p id="popup-text">Melde dich an und profitiere von<br>Rabatten und weiteren Aktionen!</p>

    <form action="https://seelen-fluesterin.us9.list-manage.com/subscribe/post?u=14343dc068029c482b3ecefa5&amp;id=6e68af0788&amp;f_id=0041d1e1f0"
      method="post"
      target="hidden_iframe"
      id="newsletter-form"
      name="mc-embedded-subscribe-form"
      class="validate">

      <input type="email" name="EMAIL" placeholder="Deine Mailadresse" required />

      <div class="datefield">
        <input class="birthday" type="text" pattern="[0-9]*" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" required />
        <input class="birthday" type="text" pattern="[0-9]*" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" required />
      </div>

      <label class="checkbox">
        <input type="checkbox" name="consent" required />
        <span>Ich bin einverstanden mit dem Newsletter-Abo</span>
      </label>

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

    <button class="dismiss" onclick="closePopup()">Fenster schließen</button>
  </div>
</div>

<iframe name="hidden_iframe" style="display:none;"></iframe>

<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
<script type="text/javascript">
  (function($) {
    window.fnames = new Array();
    window.ftypes = new Array();
    fnames[0]='EMAIL'; ftypes[0]='email';
    fnames[5]='BIRTHDAY'; ftypes[5]='birthday';
  })(jQuery);
  var $mcj = jQuery.noConflict(true);
</script>

<script>
  function closePopup() {
    document.getElementById("newsletter-popup").style.display = "none";
  }

  function showPopup() {
    document.getElementById("newsletter-popup").style.display = "flex";
  }

  document.getElementById("newsletter-form").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = e.target;
    form.submit();

    setTimeout(() => {
      form.style.display = "none";
      document.getElementById("popup-title").style.display = "none";
      document.getElementById("popup-text").style.display = "none";
      document.getElementById("thankyou-message").style.display = "block";
    }, 1000);
  });

  // Show popup after 5 seconds
  setTimeout(showPopup, 5000);
</script>

</body>
</html>