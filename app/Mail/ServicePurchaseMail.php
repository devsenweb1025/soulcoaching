<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServicePurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $service;
    public $user;
    public $transactionId;
    public $paymentMethod;

    public function __construct($service, $user, $transactionId, $paymentMethod)
    {
        $this->service = $service;
        $this->user = $user;
        $this->transactionId = $transactionId;
        $this->paymentMethod = $paymentMethod;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Neue Dienstleistung gekauft: ' . $this->service->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.service-purchase',
            with: [
                'service' => $this->service,
                'user' => $this->user,
                'transactionId' => $this->transactionId,
                'paymentMethod' => $this->paymentMethod
            ],
        );
    }
}
