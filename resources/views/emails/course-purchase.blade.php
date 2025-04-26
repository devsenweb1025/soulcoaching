<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Neuer Kurs gekauft: {{ $course->title }}</title>
</head>
<body>
    <h2>Neuer Kurs gekauft</h2>

    <p><strong>Kunde:</strong> {{ $user->name }}</p>
    <p><strong>E-Mail:</strong> {{ $user->email }}</p>

    <h3>Kurs Details:</h3>
    <p><strong>Titel:</strong> {{ $course->title }}</p>
    <p><strong>Beschreibung:</strong> {{ $course->description }}</p>
    <p><strong>Preis:</strong> CHF {{ $course->price }}</p>

    <h3>Zahlungsdetails:</h3>
    <p><strong>Zahlungsmethode:</strong> {{ $paymentMethod }}</p>
    <p><strong>Transaktions-ID:</strong> {{ $transactionId }}</p>

    <hr>
    <p>Diese E-Mail wurde automatisch generiert.</p>
</body>
</html>
