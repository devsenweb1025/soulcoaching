<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class UserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return (new MailMessage)
            ->subject('Willkommen bei unserem Service - E-Mail-Verifizierung erforderlich')
            ->greeting('Hallo ' . $notifiable->first_name . '!')
            ->line('Vielen Dank für Ihre Registrierung bei unserem Service.')
            ->line('Bitte klicke auf den folgenden Button, um deine E-Mail-Adresse zu bestätigen.')
            ->action('E-Mail-Adresse bestätigen', $verificationUrl)
            ->line('Wenn du kein Konto erstellt hast, ist keine weitere Aktion erforderlich.')
            ->line('Bei Fragen stehen wir Ihnen gerne zur Verfügung.');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Willkommen!',
            'message' => 'Vielen Dank für Ihre Registrierung.',
            'type' => 'registration_confirmation',
            'icon' => 'fas fa-user-plus',
        ];
    }
}
