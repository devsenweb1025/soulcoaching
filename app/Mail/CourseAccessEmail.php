<?php

namespace App\Mail;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseAccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $order;
    public $downloadLink;

    /**
     * Create a new message instance.
     */
    public function __construct($course, $order, $downloadLink)
    {
        $this->course = $course;
        $this->order = $order;
        $this->downloadLink = $downloadLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Zugangsdaten zu Deinem Kurs - ' . $this->course->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.course-access',
            with: [
                'course' => $this->course,
                'order' => $this->order,
                'downloadLink' => $this->downloadLink
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
