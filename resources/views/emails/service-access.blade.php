<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Service Booking Confirmation</title>
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
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa;
            margin-bottom: 30px;
        }
        .content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            color: #6c757d;
            font-size: 0.9em;
            margin-top: 30px;
        }
        .details {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Thank You for Your Booking!</h1>
    </div>

    <div class="content">
        <p>Dear {{ auth()->user()->name }},</p>

        <p>Thank you for booking our service. Your booking has been confirmed and processed successfully.</p>

        <div class="details">
            <h3>Booking Details:</h3>
            <p><strong>Service:</strong> {{ $service->name }}</p>
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Amount Paid:</strong> CHF {{ number_format($order->total, 2) }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
            @if($service->duration)
                <p><strong>Duration:</strong> {{ $service->duration }}</p>
            @endif
            @if($service->location)
                <p><strong>Location:</strong> {{ $service->location }}</p>
            @endif
        </div>

        <p>We will contact you shortly to schedule your appointment and provide further details about your service.</p>

        <p>If you have any questions or need to make changes to your booking, please don't hesitate to contact us.</p>

        <p>Best regards,<br>
        {{ config('app.name') }} Team</p>
    </div>

    <div class="footer">
        <p>This is an automated message, please do not reply directly to this email.</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>
