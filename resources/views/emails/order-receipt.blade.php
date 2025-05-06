<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Neue Bestellung #{{ $order->id }}</title>
</head>
<body>
    <h2>Neue Bestellung #{{ $order->id }}</h2>

    <p><strong>Kunde:</strong> {{ $user->first_name . " " . $user->last_name }}</p>
    <p><strong>E-Mail:</strong> {{ $user->email }}</p>
    <p><strong>Bestelldatum:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>

    <h3>Bestellte Produkte:</h3>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Produkt</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Menge</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Preis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->product->name }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->quantity }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">CHF {{ $item->price }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: right;"><strong>Zwischensumme:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>CHF {{ $order->subtotal }}</strong></td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: right;"><strong>Versandkosten:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>CHF {{ $order->shipping_cost }}</strong></td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: right;"><strong>Total:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>CHF {{ $order->total }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <h3>Lieferadresse:</h3>
    <p>
        {{ $order->shipping_address }}<br>
        {{ $order->shipping_postal_code }} {{ $order->shipping_city }}<br>
        {{ $order->shipping_country }}
    </p>

    <hr>
    <p>Diese E-Mail wurde automatisch generiert.</p>
    <p>&copy; {{ date('Y') }} Seelenfluesterin. Alle Rechte vorbehalten.</p>
</body>
</html>
