<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Neue Kontaktanfrage</title>
</head>

<body>
    <h2>Neue Kontaktanfrage</h2>

    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>E-Mail:</strong> {{ $email }}</p>
    <p><strong>Telefon:</strong> {{ $phone }}</p>
    <p><strong>Dienstleistung:</strong> {{ $service }}</p>

    <h3>Nachricht:</h3>
    <p>{{ $description }}</p>

    <hr>
    <p>Diese E-Mail wurde über das Kontaktformular auf der Website gesendet.</p>
</body>

</html>
