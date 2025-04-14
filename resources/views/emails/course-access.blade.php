<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course Access Details</title>
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
            margin-bottom: 30px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Thank You for Your Purchase!</h1>
    </div>

    <div class="content">
        <h2>Course: {{ $course->name }}</h2>
        <p>Dear {{ $order->user->name }},</p>
        <p>Thank you for purchasing our course. We're excited to have you on board!</p>

        <p>Your order details:</p>
        <ul>
            <li>Order Number: {{ $order->order_number }}</li>
            <li>Course: {{ $course->name }}</li>
            <li>Amount Paid: CHF {{ number_format($order->total, 2) }}</li>
            <li>Payment Method: {{ ucfirst($order->payment_method) }}</li>
        </ul>

        <p>You can access your course materials by clicking the button below:</p>

        <div style="text-align: center;">
            <a href="{{ $downloadLink }}" class="button">Download Course Materials</a>
        </div>

        <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
    </div>

    <div class="footer">
        <p>This is an automated message, please do not reply directly to this email.</p>
        <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
    </div>
</body>
</html>
