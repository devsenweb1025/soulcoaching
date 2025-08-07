<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellbestätigung für den Onlinekurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .content {
            padding: 20px 0;
        }

        .order-details {
            margin: 20px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
        }

        .cta-button {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bestellbestätigung für den Onlinekurs</h1>
        </div>

        <div class="content">
            @php
                $title = '';
                switch ($user->gender ?? '') {
                    case 'male':
                        $title = 'Lieber';
                        break;
                    case 'female':
                        $title = 'Liebe';
                        break;
                    case 'other':
                        $title = 'Hallo';
                        break;
                    default:
                        $title = 'Hallo';
                        break;
                }
            @endphp
            <p>{{ $title }} {{ $user->first_name }},</p>

            <p>Herzlichen Glückwunsch zu deiner Entscheidung, dem Online Kurs bei Seelenfluesterin beizutreten!</p>

            <p>Dein Online-Kurs wurde erfolgreich verarbeitet, und ich freue mich, dich auf dieser transformierenden Reise begleiten zu dürfen.</p>

            <div class="order-details">
                <h2>Bestelldetails:</h2>
                <p><strong>Bestellnummer:</strong> {{ $order->order_number }}</p>
                <p><strong>Kurs:</strong> {{ $course->title }}</p>
                <p><strong>Bezahlt:</strong> CHF {{ $order->total }}</p>
                <p><strong>Zahlungsmethode:</strong> {{ ucfirst($order->payment_method) }}</p>
            </div>

            <p>Wenn du dich transformierst und in deiner Energie shiftest, ziehst du Positives in dein Leben.</p>

            <p>Möge jeder Schritt dir neue Einsichten und inneren Frieden bringen.</p>

            <p>Du kannst deine Kursunterlagen herunterladen, indem du auf den folgenden Button klickst oder dich in deinem Kundenkonto einloggst und unter „Meine Bestellungen" nachschaust.</p>

            <div style="text-align: center;">
                <a href="{{ $downloadLink }}" class="cta-button">Kursunterlagen herunterladen</a>
            </div>

            <p><strong>Hinweis:</strong> Bei grossen Dateien zeigt Google Drive evtl. eine Meldung an, dass die Datei nicht auf Viren untersucht werden konnte. Das ist normal und du kannst die Dateien bedenkenlos herunterladen.</p>

            <p>Dein Zugang zu den Kursinhalten ist nun aktiv.</p>

            <p><em>Erkennen Wissen | Transformieren mit Magie - lass mit dem Zauber beginnen!</em></p>

            <p>Falls du fragen hast, kannst du dich gerne unter info@seelen-fluesterin.ch melden.</p>

            <p>Herzliche Grüsse,<br>
                Seelenfluesterin</p>
        </div>

        <div class="footer">
            <p>Diese ist eine automatisch generierte Nachricht, bitte antworte nicht auf diese Mail.</p>
            <p>&copy; {{ date('Y') }} Seelenfluesterin. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</body>

</html>
