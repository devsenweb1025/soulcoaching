<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Willkommen bei unserem Service')
            ->greeting('Hallo ' . $notifiable->first_name . '!')
            ->line('Vielen Dank für Ihre Registrierung.')
            ->line('Sie können sich jetzt mit Ihren Anmeldedaten einloggen.')
            ->action('Zum Dashboard', url('/dashboard'))
            ->line('Bei Fragen stehen wir Ihnen gerne zur Verfügung.');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Willkommen!',
            'message' => 'Vielen Dank für Ihre Registrierung.',
            'type' => 'registration',
            'icon' => 'fas fa-user-plus',
        ];
    }
}
