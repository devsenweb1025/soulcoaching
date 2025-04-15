<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $updateType;
    public $newValue;
    public $oldValue;

    public function __construct($order, $updateType, $newValue, $oldValue = null)
    {
        $this->order = $order;
        $this->updateType = $updateType;
        $this->newValue = $newValue;
        $this->oldValue = $oldValue;
    }

    public function envelope(): Envelope
    {
        $subject = match($this->updateType) {
            'status' => 'Order Status Update',
            'payment' => 'Payment Status Update',
            'tracking' => 'Tracking Information Update',
            default => 'Order Update'
        };

        return new Envelope(
            subject: $subject . ' - Order #' . $this->order->id,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-status-update',
        );
    }
}
