<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->subject('Neuer Benutzer registriert')
            ->greeting('Hallo Admin!')
            ->line('Ein neuer Benutzer hat sich registriert:')
            ->line('Name: ' . $this->user->first_name . ' ' . $this->user->last_name)
            ->line('E-Mail: ' . $this->user->email)
            ->line('Registriert am: ' . $this->user->created_at->format('d.m.Y H:i'))
            ->action('Benutzer anzeigen', url('/admin/benutzer/' . $this->user->id . '/edit'));
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Neuer Benutzer registriert',
            'message' => $this->user->first_name . ' ' . $this->user->last_name . ' hat sich registriert.',
            'type' => 'user_registered',
            'icon' => 'fas fa-user-plus',
            'user_id' => $this->user->id,
        ];
    }
}
