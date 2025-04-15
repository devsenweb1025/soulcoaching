<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellstatus Update</title>
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

        .update-details {
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
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bestellstatus Update</h1>
        </div>

        <div class="content">
            <p>Dear {{ $order->shipping_first_name }} {{ $order->shipping_last_name }},</p>

            <p>Deine Bestellung #{{ $order->id }} wurde aktualisiert:</p>

            <div class="update-details">
                @if ($updateType === 'status')
                    <h2>Bestellstatus Update</h2>
                    <p>Deine Bestellung wurde von <strong>{{ $oldValue ?? 'pending' }}</strong> zu
                        <strong>{{ $newValue }}</strong> aktualisiert.</p>
                @elseif($updateType === 'payment')
                    <h2>Zahlungsstatus Update</h2>
                    <p>Deine Zahlung wurde von <strong>{{ $oldValue ?? 'pending' }}</strong> zu
                        <strong>{{ $newValue }}</strong> aktualisiert.</p>
                @elseif($updateType === 'tracking')
                    <h2>Sendungsnummer Update</h2>
                    <p>Deine Bestellung wurde mit folgender Sendungsnummer versendet:</p>
                    <p><strong>Sendungsnummer:</strong> {{ $newValue['tracking_number'] }}</p>
                    @if ($newValue['tracking_url'])
                        <p><strong>Tracking URL:</strong> <a href="{{ $newValue['tracking_url'] }}">Hier klicken um deine
                                Bestellung zu verfolgen</a></p>
                    @endif
                @endif
            </div>

            <p>Du kannst deine Bestellungdetails ansehen, indem du dich in deinem Kundenkonto einloggst.</p>

            <p>Wenn du Fragen zu deiner Bestellung hast, bitte kontaktiere uns.</p>

            <p>Mit freundlichen Grüssen,<br>Dein Seelenfluesterin Team</p>
        </div>

        <div class="footer">
            <p>Diese ist eine automatisch generierte Nachricht, bitte antworte nicht auf diese Mail.</p>
            <p>&copy; {{ date('Y') }} Seelenfluesterin. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</body>

</html>
