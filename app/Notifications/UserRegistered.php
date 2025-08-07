<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

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
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        // Determine gender-specific greeting
        $title = '';
        switch ($notifiable->gender) {
            case 'male':
                $title = 'Lieber';
                break;
            case 'female':
                $title = 'Liebe';
                break;
            case 'other':
                $title = 'Hallo';
                break;
            default:
                $title = 'Hallo';
                break;
        }
        $greeting = $title . ' ' . $notifiable->first_name;

        return (new MailMessage)
            ->subject('Willkommen bei Seelenfluesterin - Verifizierung erforderlich')
            ->greeting($greeting)
            ->line('Willkommen in unserer Seelenfluesterin Gemeinschaft!')
            ->line('Deine Registrierung für ein Kundenkonto war erfolgreich und öffnet dir die Tür zu einer Welt voller Inspiration, Wachstum und Magie!')
            ->line('Wenn du dich transformierst und in deiner Energie shiftest, ziehst du Positives an und bereitest den Weg für neue Möglichkeiten.')
            ->line('Ich freue mich, dich auf deinem spirituellen Weg zu begleiten und dir Zugang zu exklusiven Inhalten und Angeboten zu bieten.')
            ->line('Klicke auf den untenstehenden Button um deine Mail Adresse zu bestätigen und lass uns gemeinsam auf diese aufregende Reise gehen!')
            ->action('E-Mail-Adresse bestätigen', $verificationUrl)
            ->line('Falls du fragen hast, kannst du dich gerne unter info@seelen-fluesterin.ch melden.')
            ->salutation('Herzliche Grüsse, Seelenfluesterin');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Willkommen bei Seelenfluesterin',
            'message' => 'Deine Registrierung war erfolgreich. Bitte bestätige deine E-Mail-Adresse.',
            'type' => 'welcome',
            'icon' => 'fas fa-heart',
        ];
    }
}
