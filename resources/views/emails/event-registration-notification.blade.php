<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neue Anmeldung für Seelenlounge Event</title>
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
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .event-details {
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .registration-details {
            background-color: #f3e5f5;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Neue Anmeldung für Seelenlounge Event</h1>
        <p>Jemand hat sich für eines Ihrer Events angemeldet!</p>
    </div>

    <div class="event-details">
        <h2>Event Details:</h2>
        <p><strong>Titel:</strong> {{ $event->title }}</p>
        <p><strong>Kategorie:</strong> {{ $event->category }}</p>
        <p><strong>Datum:</strong> {{ $event->formatted_date }}</p>
        <p><strong>Zeit:</strong> {{ $event->formatted_time }}</p>
        <p><strong>Zoom Link:</strong> <a href="{{ $event->zoom_link }}">{{ $event->zoom_link }}</a></p>
    </div>

    <div class="registration-details">
        <h2>Anmeldung Details:</h2>
        <p><strong>E-Mail:</strong> {{ $registration->email }}</p>
        @if($registration->name)
        <p><strong>Name:</strong> {{ $registration->name }}</p>
        @endif
        <p><strong>Anmeldezeit:</strong> {{ $registration->registered_at->format('d.m.Y H:i') }}</p>
    </div>

    <div class="footer">
        <p>Diese E-Mail wurde automatisch generiert, da sich jemand für Ihr Seelenlounge Event angemeldet hat.</p>
        <p>Sie können nun sicher sein, dass mindestens eine Person an dem Event teilnehmen wird.</p>
    </div>
</body>
</html>
