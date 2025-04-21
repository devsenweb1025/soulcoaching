<?php

namespace App\Notifications;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CoursePurchased extends Notification implements ShouldQueue
{
    use Queueable;

    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Kurs gekauft')
            ->greeting('Hallo ' . $notifiable->first_name . '!')
            ->line('Sie haben den Kurs "' . $this->course->title . '" gekauft.')
            ->line('Preis: @chf(' . $this->course->price . ')')
            ->action('Kurs anzeigen', url('/courses/' . $this->course->id))
            ->line('Vielen Dank für Ihren Kauf!');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Kurs gekauft',
            'message' => 'Sie haben den Kurs "' . $this->course->title . '" gekauft.',
            'type' => 'course_purchased',
            'icon' => 'fas fa-graduation-cap',
            'course_id' => $this->course->id,
        ];
    }
}