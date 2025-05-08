<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Details zum Kurszugang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Vielen Dank für deinen Einkauf!</h1>
    </div>

    <div class="content">
        <h2>Kurs: {{ $course->title }}</h2>
        <p>Lieber {{ $user->first_name . ' ' . $user->last_name }},</p>
        <p>vielen Dank, dass du meinen Kurs gekauft hast. Ich freue mich sehr, dass du mit dabei bist!</p>

        <p>Deine Bestelldetails:</p>
        <ul>
            <li>Bestellnummer: {{ $order->order_number }}</li>
            <li>Kurs: {{ $course->title }}</li>
            <li>Bezahlt: CHF {{ $order->total }}</li>
            <li>Zahlungsmethode: {{ ucfirst($order->payment_method) }}</li>
        </ul>

        <p>Du kannst deine Kursunterlagen herunterladen, indem du auf den folgenden Button klickst
            oder dich in deinem Kundenkonto einloggst und unter „Meine Bestellungen“ nachschaust.</p>

        <div style="text-align: center;">
            <a href="{{ $downloadLink }}" class="button">Kursmaterialien herunterladen</a>
        </div>

        <p>Wenn du Fragen hast oder Hilfe benötigst, zögere bitte nicht, dich bei mir zu melden.</p>
    </div>

    <div class="footer">
        <p>Das ist eine automatisch generierte Nachricht, bitte antworte nicht direkt auf diese Mail.</p>
        <p>&copy; {{ date('Y') }} Seelenfluesterin. Alle Rechte vorbehalten.</p>
    </div>
</body>

</html>
