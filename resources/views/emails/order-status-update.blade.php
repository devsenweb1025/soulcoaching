<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Update</title>
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
            <h1>Order Update</h1>
        </div>

        <div class="content">
            <p>Dear {{ $order->shipping_first_name }} {{ $order->shipping_last_name }},</p>

            <p>Your order #{{ $order->id }} has been updated:</p>

            <div class="update-details">
                @if($updateType === 'status')
                    <h2>Order Status Update</h2>
                    <p>Your order status has been updated from <strong>{{ $oldValue ?? 'pending' }}</strong> to <strong>{{ $newValue }}</strong>.</p>
                @elseif($updateType === 'payment')
                    <h2>Payment Status Update</h2>
                    <p>Your payment status has been updated from <strong>{{ $oldValue ?? 'pending' }}</strong> to <strong>{{ $newValue }}</strong>.</p>
                @elseif($updateType === 'tracking')
                    <h2>Tracking Information Update</h2>
                    <p>Your order has been shipped with the following tracking information:</p>
                    <p><strong>Tracking Number:</strong> {{ $newValue['tracking_number'] }}</p>
                    @if($newValue['tracking_url'])
                        <p><strong>Tracking URL:</strong> <a href="{{ $newValue['tracking_url'] }}">Click here to track your order</a></p>
                    @endif
                @endif
            </div>

            <p>You can view your order details by logging into your account.</p>

            <p>If you have any questions about your order, please contact us.</p>

            <p>Best regards,<br>Your Store Team</p>
        </div>

        <div class="footer">
            <p>This is an automated message, please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
