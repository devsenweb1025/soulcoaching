<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update zu deiner Bestellung</title>
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
            <h1>Update zu deiner Bestellung</h1>
        </div>

        <div class="content">
            @php
                $title = '';
                switch ($gender) {
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

                // Helper functions to translate status values
                function translateOrderStatus($status) {
                    return match($status) {
                        'pending' => 'Ausstehend',
                        'processing' => 'In Bearbeitung',
                        'shipped' => 'Versendet',
                        'delivered' => 'Zugestellt',
                        'completed' => 'Abgeschlossen',
                        'cancelled' => 'Storniert',
                        'refunded' => 'Rückerstattet',
                        default => 'Unbekannt',
                    };
                }

                function translatePaymentStatus($status) {
                    return match($status) {
                        'pending' => 'Ausstehend',
                        'completed' => 'Abgeschlossen',
                        'succeeded' => 'Erfolgreich',
                        'processing' => 'In Bearbeitung',
                        'declined' => 'Abgelehnt',
                        'failed' => 'Fehlgeschlagen',
                        'refunded' => 'Rückerstattet',
                        'partially_refunded' => 'Teilweise Rückerstattet',
                        default => 'Unbekannt',
                    };
                }
            @endphp
            <p>{{ $title }} {{ $order->shipping_first_name }},</p>

            <p>Deine Bestellung #{{ $order->id }} wurde aktualisiert.</p>

            <div class="update-details">
                @if ($updateType === 'status')
                    <p>Bestellstatus wurde von <strong>{{ translateOrderStatus($oldValue ?? 'pending') }}</strong> auf <strong>{{ translateOrderStatus($newValue) }}</strong> geändert</p>
                @elseif($updateType === 'payment')
                    <p>Zahlungsstatus wurde von <strong>{{ translatePaymentStatus($oldValue ?? 'pending') }}</strong> auf <strong>{{ translatePaymentStatus($newValue) }}</strong> geändert</p>
                @elseif($updateType === 'tracking')
                    <p>Deine Sendungsnummer lautet: <strong>{{ $newValue['tracking_number'] }}</strong></p>
                    @if ($newValue['tracking_url'])
                        <p><strong>Tracking URL:</strong> <a href="{{ $newValue['tracking_url'] }}">Hier klicken um deine Bestellung zu verfolgen</a></p>
                    @endif
                @endif
            </div>

            <p>Du kannst die Bestelldetails jederzeit in deinem Kundenkonto einsehen.</p>

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
