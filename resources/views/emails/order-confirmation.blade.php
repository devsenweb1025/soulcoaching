<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellbestätigung</title>
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

        .order-items {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .order-items th,
        .order-items td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .order-items th {
            background: #f5f5f5;
        }

        .shipping-details {
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
            <h1>Bestellbestätigung</h1>
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
            @endphp
            <p>{{ $title }} {{ $order['shipping_first_name'] }},</p>

            <p>Vielen Dank für deine Bestellung.</p>

            <p>Sie ist bei mir eingegangen und wird demnächst bearbeitet.</p>

            <div class="order-details">
                <h2>Bestelldetails:</h2>
                <p><strong>Bestellnummer:</strong> {{ $order['id'] }}</p>
                <p><strong>Bestelldatum:</strong> {{ now()->format('d.m.Y') }}</p>
            </div>

            <h3>Bestellte Produkte:</h3>
            <table class="order-items">
                <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Menge</th>
                        <th>Preis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order['items'] as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>CHF {{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Zwischensumme:</strong></td>
                        <td><strong>CHF {{ $order['subtotal'] }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Versandkosten:</strong></td>
                        <td><strong>CHF {{ $order['shipping_cost'] }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Gesamt:</strong></td>
                        <td><strong>CHF {{ $order['total'] }}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <div class="shipping-details">
                <h3>Versanddetails:</h3>
                <p>
                    {{ $order['shipping_first_name'] }} {{ $order['shipping_last_name'] }}<br>
                    {{ $order['shipping_address'] }}<br>
                    {{ $order['shipping_postal_code'] }} {{ $order['shipping_city'] }}<br>
                    {{ $order['shipping_country'] }}<br>
                    {{ $order['shipping_email'] }}<br>
                    {{ $order['shipping_phone'] }}
                </p>
            </div>

            <p>Wenn du Fragen zu deiner Bestellung hast, kontaktiere mich bitte nicht über diese E-Mail, da sie automatisch generiert wurde.</p>

            <p>Gerne kannst du mich über info@seelen-fluesterin.ch erreichen.</p>

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
