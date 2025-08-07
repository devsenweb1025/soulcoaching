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
    public $gender;
    public $updateType;
    public $newValue;
    public $oldValue;

    public function __construct($order, $gender, $updateType, $newValue, $oldValue = null)
    {
        $this->order = $order;
        $this->gender = $gender;
        $this->updateType = $updateType;
        $this->newValue = $newValue;
        $this->oldValue = $oldValue;
    }

    public function envelope(): Envelope
    {
        $subject = match($this->updateType) {
            'status' => 'Update zu deiner Bestellung - Bestellstatus',
            'payment' => 'Update zu deiner Bestellung - Zahlungsstatus',
            'tracking' => 'Update zu deiner Bestellung - Sendungsnummer',
            default => 'Update zu deiner Bestellung'
        };

        return new Envelope(
            subject: $subject . ' - Seelenfluesterin',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-status-update',
        );
    }
}
