<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Buchungsbestätigung</title>
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
            padding: 20px 0;
            background-color: #f8f9fa;
            margin-bottom: 30px;
        }

        .content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            color: #6c757d;
            font-size: 0.9em;
            margin-top: 30px;
        }

        .details {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Vielen Dank für Deine Buchung!</h1>
    </div>

    <div class="content">
        <p>Lieber {{ $user->first_name . " " . $user->last_name }},</p>

        <p>Vielen Dank für Deine Buchung. Deine Buchung wurde bestätigt und erfolgreich verarbeitet.</p>

        <div class="details">
            <h3>Buchungsdetails:</h3>
            <p><strong>Dienstleistung:</strong> {{ $service->title }}</p>
            <p><strong>Bestellnummer:</strong> {{ $order->order_number }}</p>
            <p><strong>Betrag bezahlt:</strong> CHF {{ $order->total }}</p>
            <p><strong>Zahlungsmethode:</strong> {{ ucfirst($order->payment_method) }}</p>
        </div>

        <p>Ich werde mich bei dir so schnell wie möglich melden, um mit Dir einen Termin zu vereinbaren</p>

        <p>Wenn Du Fragen zu Deiner Buchung hast oder Änderungen an Deiner Buchung vornehmen möchten, bitte kontaktieren
            mich nicht über diese Mail, da dies eine automatisch generierte Nachricht ist. </p>
        <p>Liebe Grüsse,<br>
            Seelenfluesterin</p>
    </div>

    <div class="footer">
        <p>Diese ist eine automatisch generierte Nachricht, bitte antworte nicht auf diese Mail.</p>
        <p>&copy; {{ date('Y') }} Seelenfluesterin. Alle Rechte vorbehalten.</p>
    </div>
</body>

</html>
