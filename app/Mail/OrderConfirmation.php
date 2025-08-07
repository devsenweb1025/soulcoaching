<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $gender;

    public function __construct($order, $gender)
    {
        $this->order = $order;
        $this->gender = $gender;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bestellbestätigung für den Onlinekurs - Seelenfluesterin',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation',
            with: [
                'order' => $this->order,
                'gender' => $this->gender,
            ],
        );
    }
}
