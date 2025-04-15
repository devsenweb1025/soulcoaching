<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Neue Dienstleistung gekauft: {{ $service->title }}</title>
</head>
<body>
    <h2>Neue Dienstleistung gekauft</h2>

    <p><strong>Kunde:</strong> {{ $user->name }}</p>
    <p><strong>E-Mail:</strong> {{ $user->email }}</p>

    <h3>Dienstleistung Details:</h3>
    <p><strong>Titel:</strong> {{ $service->title }}</p>
    <p><strong>Beschreibung:</strong> {{ $service->description }}</p>
    <p><strong>Preis:</strong> CHF {{ number_format($service->price, 2, '.', "'") }}</p>

    <h3>Zahlungsdetails:</h3>
    <p><strong>Zahlungsmethode:</strong> {{ $paymentMethod }}</p>
    <p><strong>Transaktions-ID:</strong> {{ $transactionId }}</p>

    <hr>
    <p>Diese E-Mail wurde automatisch generiert.</p>
</body>
</html>
