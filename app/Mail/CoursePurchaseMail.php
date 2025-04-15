<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoursePurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $user;
    public $transactionId;
    public $paymentMethod;

    public function __construct($course, $user, $transactionId, $paymentMethod)
    {
        $this->course = $course;
        $this->user = $user;
        $this->transactionId = $transactionId;
        $this->paymentMethod = $paymentMethod;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Neuer Kurs gekauft: ' . $this->course->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.course-purchase',
            with: [
                'course' => $this->course,
                'user' => $this->user,
                'transactionId' => $this->transactionId,
                'paymentMethod' => $this->paymentMethod
            ],
        );
    }
}
