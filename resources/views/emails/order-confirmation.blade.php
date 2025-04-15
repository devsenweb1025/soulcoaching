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
        .order-items th, .order-items td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .order-items th {
            background: #f5f5f5;
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
            <p>Vielen Dank für Deine Bestellung!</p>
        </div>

        <div class="content">
            <p>Lieber {{ $order['shipping_first_name'] }} {{ $order['shipping_last_name'] }},</p>

            <p>Vielen Dank für Deine Bestellung. Wir haben sie erhalten und bearbeiten sie. Hier sind Deine Bestelldetails:</p>

            <div class="order-details">
                <h2>Bestellnummer #{{ $order['id'] }}</h2>
                <p><strong>Bestelldatum:</strong> {{ now()->format('F j, Y') }}</p>
            </div>

            <h3>Bestellpositionen</h3>
            <table class="order-items">
                <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Menge</th>
                        <th>Preis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order['items'] as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>CHF {{ number_format($item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Zwischensumme:</strong></td>
                        <td><strong>CHF {{ number_format($order['subtotal'], 2) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Versandkosten:</strong></td>
                        <td><strong>CHF {{ number_format($order['shipping_cost'], 2) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Gesamt:</strong></td>
                        <td><strong>CHF {{ number_format($order['total'], 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <h3>Versanddetails</h3>
            <p>
                {{ $order['shipping_first_name'] }} {{ $order['shipping_last_name'] }}<br>
                {{ $order['shipping_address'] }}<br>
                {{ $order['shipping_postal_code'] }} {{ $order['shipping_city'] }}<br>
                {{ $order['shipping_country'] }}<br>
                {{ $order['shipping_email'] }}<br>
                {{ $order['shipping_phone'] }}
            </p>

            <p>Wenn Du Fragen zu Deiner Bestellung hast, bitte kontaktiere uns.</p>

            <p>Mit freundlichen Grüssen,<br>Dein Seelenfluesterin Team</p>
        </div>

        <div class="footer">
            <p>Diese ist eine automatisch generierte Nachricht, bitte antworte nicht auf diese Mail.</p>
            <p>&copy; {{ date('Y') }} Seelenfluesterin. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</body>
</html>
